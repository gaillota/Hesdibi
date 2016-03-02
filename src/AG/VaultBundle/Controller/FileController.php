<?php

namespace AG\VaultBundle\Controller;


use AG\VaultBundle\Entity\File;
use AG\VaultBundle\Entity\Folder;
use AG\VaultBundle\Entity\ShareLink;
use AG\VaultBundle\Form\EmailType;
use AG\VaultBundle\Form\FileEditType;
use AG\VaultBundle\Form\FileType;
use AG\VaultBundle\Form\ShareWithType;
use Doctrine\ORM\EntityManager;
use Mailgun\Mailgun;
use Sinner\Phpseclib\Crypt\Crypt_AES;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class FileController extends Controller
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param File $file
     * @return JsonResponse
     * @Secure(roles="ROLE_ADMIN")
     */
    public function renameAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $name = $this->request->query->get('name', null);

        $response = array(
            'success' => 0,
        );

        if (null !== $name) {
            $file->setName($name);
            $this->em->persist($file);
            $this->em->flush();

            $response['success'] = 1;
            $response['id'] = $file->getId();
            $response['name'] = $file->getName();
            $response['type'] = 'file';
        }

        return new JsonResponse($response);
    }

    /**
     * @param File $file
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function removeAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($this->request)->isValid()) {
            @unlink($file->getPath());
            $this->em->remove($file);
            $this->em->flush();

            $this->addFlash('danger', '<i class="fa fa-trash"></i> File successfully removed !');

            return null !== $file->getFolder() ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $file->getFolder()->getId(), 'slug' => $file->getFolder()->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
        }

        return array(
            'file' => $file,
            'form' => $form->createView(),
        );
    }

    /**
     * @param File $file
     * @return Response
     */
    public function downloadAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner() && !$file->getAuthorizedUsers()->contains($this->getUser()))
            throw new AccessDeniedException("This file does not belong to you.");

        $content = file_get_contents($file->getPath());

        $response = new Response();
        $response->headers->set('Content-Type', $file->getMimeType());
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$file->getName().'"');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Content-Length', filesize($file->getPath()));
        $response->setStatusCode(200);
        $response->setContent($content);

        return $response;
    }

    /**
     * @param File $file
     * @return array
     * @Template
     */
    public function previewAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner() && !$file->getAuthorizedUsers()->contains($this->getUser()))
            throw new AccessDeniedException("This file does not belong to you.");

        $response = new Response();
        $response->headers->set('Content-Type', $file->getMimeType());
        $response->headers->set('Content-Disposition', 'inline; filename="'.$file->getName().'"');
        $response->setContent(file_get_contents($file->getPath()));

        return $response;
    }

    /**
     * @param File $file
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function sendAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $form = $this->createForm(new EmailType);

        if ($this->request->isMethod('POST')) {

            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $recipient = $form->get('email')->getData();
                $subject = $form->get('subject')->getData();
                $body = $this->renderView('AGVaultBundle:Mail:email.html.twig', array(
                        'email' => $form->get('email')->getData(),
                        'file' => $file,
                    )
                );
                $data = array(
                    'attachment' => array(
                        $file->getPath()
                    )
                );

                $emailWrapper = $this->get('email_wrapper');
                $emailWrapper
                    ->setRecipient($recipient)
                    ->setSubject($subject)
                    ->setBody($body)
                    ->setData($data)
                ;

                if ($emailWrapper->send()) {
                    $sendToArray = $file->getSendTo();

                    $sendTo = $form->get('email')->getData();
                    $sendAt = new \DateTime();
                    $newSending = array($sendTo, $sendAt);
                    array_push($sendToArray, $newSending);
                    $file->setSendTo($sendToArray);
                    $this->em->persist($file);
                    $this->em->flush();

                    $this->addFlash('success', '<i class="fa fa-send-o"></i> E-mail successfully sent !');
                } else {
                    $this->addFlash('danger', '<i class="fa fa-times-circle"></i> Error while sending the e-mail');
                }

                return $this->redirectCorrectly($file);
            }

            $this->addFlash('danger', '<i class="fa fa-times-circle"></i> An error occured.');
        }

        return array(
            'form' => $form->createView(),
            'file' => $file
        );
    }

    /**
     * @param File $file
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function moveAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $form = $this->createForm(new FileEditType, $file);
        $formerFolder = $file->getFolder();

        if ($this->request->isMethod('POST')) {
            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $this->em->persist($file);
                $this->em->flush();

                $this->addFlash('success', '<i class="fa fa-arrows"></i> File location successfully changed !');

                return null !== $formerFolder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $formerFolder->getId(), 'slug' => $formerFolder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }

            $this->addFlash('danger', '<i class="fa fa-times-circle"></i> An error occured.');
        }

        return array(
            'file' => $file,
            'form' => $form->createView(),
        );
    }

    /**
     * @param File $file
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function detailsAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        return array(
            'file' => $file
        );
    }

    /**
     * @param File $file
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function shareWithAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $regularUsers = $this->em->getRepository('AGUserBundle:User')->findRegularUsers();

        if (count($regularUsers) <= 0) {
            $this->addFlash('danger', '<i class="fa fa-times-circle"></i> Please add a user before you can share files with anyone.');
            return $this->redirectCorrectly($file);
        }

        $form = $this->createForm(new ShareWithType(), $file);

        if ($this->request->isMethod('POST')) {
            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $this->em->persist($file);
                $this->em->flush();

                $this->addFlash('info', '<i class="fa fa-users"></i> File is now shared !');

                return $this->redirectCorrectly($file);
            }

            $this->addFlash('danger', '<i class="fa fa-times-circle"></i> An error occured.');
        }

        return array(
            'form' => $form->createView(),
            'file' => $file,
        );
    }

    /**
     * @param File $file
     * @return array
     * @Secure(roles="ROLE_ADMIN")
     */
    public function generateLinkAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        $shareLink = new ShareLink();
        $file->addShareLink($shareLink);

        $length = 20;
        $token = bin2hex(openssl_random_pseudo_bytes($length));

        $shareLink->setFile($file)->setToken($token);

        $this->em->persist($shareLink);
        $this->em->flush();

        return new JsonResponse(array(
            'response' => 1,
            'route' => $this->generateUrl('ag_vault_file_show', array('token' => $shareLink->getToken()), UrlGeneratorInterface::ABSOLUTE_URL),
        ));
    }

    /**
     * @param File $file
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function getLinksAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("This file does not belong to you.");

        return array(
            'file' => $file,
        );
    }

    /**
     * @param $token
     * @return Response
     */
    public function showAction($token)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->findOneByToken($token);

        if (null === $file) {
            throw $this->createNotFoundException('This link is either expired or does not exist anymore.');
        }

        $response = new Response();
        $response->headers->set('Content-Type', "application/pdf");
        $response->headers->set('Content-Disposition', 'inline; filename="'.$file->getName().'"');
        $response->setContent(file_get_contents($file->getPath()));

        return $response;
    }

    /**
     * @param File $file
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * Get the correct redirection depending on where we are on the files' tree
     */
    private function redirectCorrectly(File $file)
    {
        return null === $file->getFolder() ? $this->redirectToRoute('ag_vault_homepage') : $this->redirectToRoute('ag_vault_folder_show', array(
            'id' => $file->getFolder()->getId(),
            'slug' => $file->getFolder()->getSlug(),
        ));
    }
}
