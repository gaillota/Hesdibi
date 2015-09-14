<?php

namespace AG\VaultBundle\Controller;


use AG\VaultBundle\Entity\File;
use AG\VaultBundle\Entity\Folder;
use AG\VaultBundle\Form\EmailType;
use AG\VaultBundle\Form\FileEditType;
use AG\VaultBundle\Form\FileType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
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
        if ($this->getUser() !== $file->getOwner())
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
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $response = new Response();
        $response->headers->set('Content-Type', "application/pdf");
        $response->headers->set('Content-Disposition', 'inline; filename="'.$file->getName().'"');
        $response->setContent(file_get_contents($file->getPath()));
//        @readfile($file->getPath());

        return $response;
    }

    /**
     * @param File $file
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     */
    public function sendAction(File $file)
    {
        if ($this->getUser() !== $file->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");



        $form = $this->createForm(new EmailType());

        if ($this->request->isMethod('POST')) {

            $form->handleRequest($this->request);

            if ($form->isValid()) {

                $message = \Swift_Message::newInstance();
                $message
                    ->setSubject($form->get('subject')->getData())
                    ->setFrom(array('contact@antoine-gaillot.fr' => 'Antoine Gaillot'))
                    ->setTo($form->get('email')->getData())
                    ->setBody(
                        $this->renderView(
                            'AGVaultBundle:Mail:email.html.twig',
                            array(
                                'email' => $form->get('email')->getData(),
                                'file' => $file,
                            )
                        ), 'text/html'
                    )
                    ->attach(
                        \Swift_Attachment::fromPath($file->getPath())->setFilename($file->getName())
                    )
                ;

                $headers =& $message->getHeaders();
                $headers->addIdHeader('Message-ID', "b3eb7202-d2f1-11e4-b9d6-1681e6b88ec1@".$_SERVER['SERVER_NAME']);
                $headers->addTextHeader('MIME-Version', '1.0');
                $headers->addTextHeader('X-Mailer', 'PHP v' . phpversion());
                $headers->addParameterizedHeader('Content-type', 'text/html', ['charset' => 'utf-8']);

                $success = $this->get('mailer')->send($message);

                if ($success > 0) {
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
}
