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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Response;
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
     * @param Folder $folder
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function uploadAction(Folder $folder = null)
    {
        if (null !== $folder && $this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Vous ne pouvez pas ajouter de fichier à ce dossier car il ne vous appartient pas.");

        $file = new File;
        $file->setFolder($folder);
        $formFile = $this->createForm(new FileType, $file);

        if ($this->request->isMethod('POST')) {
            $formFile->handleRequest($this->request);

            if ($formFile->isValid()) {
                if (null !== $folder) {
                    $folder->setLastModified(new \DateTime());
                    $this->em->persist($folder);
                }
                $this->em->persist($file);
                if ($file->getFile()) {
                    $this->get('stof_doctrine_extensions.uploadable.manager')->markEntityToUpload($file, $file->getFile());
                }
                $this->em->flush();

                $this->addFlash('success', 'Fichier ajouté avec succès !');

                return null !== $folder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $folder->getId(), 'slug' => $folder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }
        }

        $listParents = array();
        if (null !== $folder) {
            $nextParent = $folder->getParent();
            while (null !== $nextParent):
                $listParents[] = $nextParent;
                $nextParent = $nextParent->getParent();
            endwhile;
            $listParents = array_reverse($listParents);
        }

        return array(
            'form' => $formFile->createView(),
            'folder' => $folder,
            'listParents' => $listParents,
        );
    }

    /**
     * @param File $file
     * @return JsonResponse
     * @Secure(roles="ROLE_ADMIN")
     */
    public function renameAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($this->request)->isValid()) {
            unlink($file->getPath());
            $this->em->remove($file);
            $this->em->flush();

            $this->addFlash('danger', 'Fichier supprimé avec succès !');

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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $response = new Response();
        $response->headers->set('Content-Type', "application/pdf");
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$file->getName().'"');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Content-Length', filesize($file->getPath()));
        $response->setStatusCode(200);
        $response->setContent(file_get_contents($file->getPath()));

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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $response = new Response();
        $response->headers->set('Content-Type', "application/pdf");
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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $form = $this->createForm(new EmailType());

        if ($this->request->isMethod('POST')) {

            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $mg = new Mailgun($this->container->getParameter('mailgun_api_key'));
                $domain = $this->container->getParameter('domain_name');

                $message = array(
                    'from'      => 'no-reply@antoine-gaillot.com',
                    'to'        => $form->get('email')->getData(),
                    'subject'   => $form->get('subject')->getData(),
                    'html'      => $this->renderView(
                        'AGVaultBundle:Mail:email.html.twig',
                        array(
                            'email' => $form->get('email')->getData(),
                            'file' => $file,
                        )
                    )
                );

                $mg->sendMessage($domain, $message, array(
                    'attachment' => array($file->getPath())
                ));

                $result = $mg->get("$domain/log", array(
                    'limit' => 1,
                    'skip'  => 0)
                );

                if ($result->http_response_code == 200) {
                    $sendToArray = $file->getSendTo();

                    $sendTo = $form->get('email')->getData();
                    $sendAt = new \DateTime();
                    $newSending = array($sendTo, $sendAt);
                    array_push($sendToArray, $newSending);
                    $file->setSendTo($sendToArray);
                    $this->em->persist($file);
                    $this->em->flush();

                    $this->addFlash('success', 'E-mail envoyé avec succès !');
                } else {
                    $this->addFlash('danger', 'Erreur lors de l\'envoi de l\'email');
                }

                return null !== $file->getFolder() ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $file->getFolder()->getId(), 'slug' => $file->getFolder()->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }

            $this->addFlash('danger', 'Une erreur est survenue. Veuillez contacter le big boss pour un petit service après-vente qui mets dans le bien.');
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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $form = $this->createForm(new FileEditType, $file);
        $formerFolder = $file->getFolder();

        if ($this->request->isMethod('POST')) {
            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $this->em->persist($file);
                $this->em->flush();

                $this->addFlash('success', 'Emplacement du fichier modifé avec succès !');

                return null !== $formerFolder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $formerFolder->getId(), 'slug' => $formerFolder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }

            $this->addFlash('danger', 'Une erreur est survenue. Veuillez contacter le big boss pour un petit service après-vente qui mets dans le bien.');
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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $form = $this->createForm(new ShareWithType(), $file);

        if ($this->request->isMethod('POST')) {
            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $this->em->persist($file);
                $this->em->flush();

                $this->addFlash('info', 'Fichier partagé avec succès !');

                return null === $file->getFolder() ? $this->redirectToRoute('ag_vault_homepage') : $this->redirectToRoute('ag_vault_folder_show', array(
                    'id' => $file->getFolder()->getId(),
                    'slug' => $file->getFolder()->getSlug(),
                ));
            }

            $this->addFlash('danger', 'Une erreur est survenue. Veuillez contacter le big boss pour un petit service après-vente qui mets dans le bien.');
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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

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
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        return array(
            'file' => $file,
        );
    }

    /**
     * @param File $file
     * @return Response
     */
    public function showAction($token)
    {
        $file = $this->em->getRepository('AGVaultBundle:File')->findOneByToken($token);

        if (null === $file) {
            throw $this->createNotFoundException('Le lien que vous recherchez n\'existe pas.');
        }

        $response = new Response();
        $response->headers->set('Content-Type', "application/pdf");
        $response->headers->set('Content-Disposition', 'inline; filename="'.$file->getName().'"');
        $response->setContent(file_get_contents($file->getPath()));

        return $response;
    }
}
