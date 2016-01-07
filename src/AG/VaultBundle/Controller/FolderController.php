<?php

namespace AG\VaultBundle\Controller;


use AG\VaultBundle\Entity\File;
use AG\VaultBundle\Entity\Folder;
use AG\VaultBundle\Form\EmailType;
use AG\VaultBundle\Form\FileType;
use AG\VaultBundle\Form\FolderEditType;
use AG\VaultBundle\Form\FolderType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class FolderController extends Controller
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
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction()
    {
        $listFolders = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
            'owner' => $this->getUser(),
            'parent' => null,
        ), array(
            'name' => 'ASC'
        ));

//        foreach($listFolders as $folder) {
//            echo '<pre>';
//            var_dump($folder->getId() . ' - ' . $folder->getName());
//            echo '</pre>';
//            if (null !== $folder->getChildren()) {
//                foreach ($folder->getChildren() as $child) {
//                    $child->addChild($this->getSubFolder($child));
//                }
//            }
//        }

        return array(
            'listFolders' => $listFolders,
        );
    }

//    private function getSubFolder(Folder $folder)
//    {
//        echo '<pre>';
//        var_dump($folder->getId() . ' - ' . $folder->getName());
//        echo '</pre>';
//
//        $children = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
//            'owner' => $this->getUser(),
//            'parent' => $folder->getId(),
//        ));
//
//        foreach ($children as $child) {
//            $child->addChild($this->getSubFolder($child));
//        }
//
//        return $folder;
//    }

    /**
     * @param Folder $folder
     * @return array
     */
    public function showAction(Folder $folder = null, $slug = null)
    {
        //Fetch the research from the query if it exists
        $search = $this->request->query->get('s', null);

        //If user is not admin
        if (!$this->getUser()->hasRole('ROLE_ADMIN')) {
            //If non-admin user is somehow not in the root directory, kick the fuck outta him.
            if (null !== $folder)
                throw new AccessDeniedException('Vous ne pouvez pas accéder à ce dossier.');

            return $this->render('AGVaultBundle:Folder:showUser.html.twig', array(
                'listFiles' => $this->em->getRepository('AGVaultBundle:File')->findByAuthorizedUsers($this->getUser()),
            ));
        }

        //Check if folder is owned by user
        if (null !== $folder && $this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Vous ne pouvez pas accéder à ce dossier.");

        //Check slug
        if (null !== $folder && $folder->getSlug() !== $slug)
            return $this->redirectToRoute('ag_vault_folder_show', array(
                'id' => $folder->getId(),
                'slug' => $folder->getSlug(),
            ), 301);

        //Create new folder and associated form in case of new folder
        $newFolder = new Folder;
        $newFolder->setParent($folder);
        $formFolder = $this->createForm(new FolderType, $newFolder);

        //Create new file and associated form in case of upload of file
        $file = new File;
        $file->setFolder($folder);
        $formFile = $this->createForm(new FileType, $file);

        //If a form has been submitted
        if ($this->request->isMethod('POST')) {
            $formFolder->handleRequest($this->request);
            $formFile->handleRequest($this->request);

            //If the folder form is valid => New folder
            if ($formFolder->isValid()) {
                $this->em->persist($newFolder);
                $this->em->flush();

                return $this->redirectToRoute('ag_vault_folder_show', array(
                    'id' => $newFolder->getId(),
                    'slug' => $newFolder->getSlug()
                ));
            }

            //If the file form is valid => New file
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

                $this->addFlash('success', '<i class="fa fa-file-pdf-o"></i> Fichier ajouté avec succès !');

                return null !== $folder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $folder->getId(), 'slug' => $folder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }

            $this->addFlash('danger', '<i class="fa fa-times-circle"></i> Une erreur est survenue.');
        }

        //If a research has been made
        if(!empty($search)) {
            $listFolders = $this->em->getRepository('AGVaultBundle:Folder')->findSearch($search, $this->getUser());

            $listFiles = $this->em->getRepository('AGVaultBundle:File')->findSearch($search, $this->getUser());
        } else {
            $listFolders = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
                'parent' => $folder,
                'owner' => $this->getUser(),
            ), array(
                'name' => 'ASC'
            ));
            $listFiles = $this->em->getRepository('AGVaultBundle:File')->findBy(array(
                'folder' => $folder,
                'owner' => $this->getUser(),
            ), array(
                'name' => 'ASC'
            ));
        }

        //Retrieve the list of every parents for the current folder
        $listParents = array();
        if (null !== $folder) {
            $nextParent = $folder->getParent();
            while (null !== $nextParent):
                $listParents[] = $nextParent;
                $nextParent = $nextParent->getParent();
            endwhile;
            $listParents = array_reverse($listParents);
        }

        //Get the size of the current folder
        $size = null !== $folder ? $folder->getSize() : $this->em->createQuery("SELECT SUM(f.size) FROM AG\VaultBundle\Entity\File f")->getSingleScalarResult();

        return $this->render('AGVaultBundle:Folder:showAdmin.html.twig', array(
            'currentFolder' => $folder,
            'formFolder' => $formFolder->createView(),
            'formFile' => $formFile->createView(),
            'listFolders' => $listFolders,
            'listFiles' => $listFiles,
            'listParents' => $listParents,
            'search' => $search,
            'size' => $size,
        ));
    }

    /**
     * @param Folder $folder
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction(Folder $folder)
    {
        if ($this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Ce dossier ne vous appartient pas.");

        $form = $this->createForm(new FolderType, $folder);

        if ($this->request->isMethod('POST')) {
            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $this->em->persist($folder);
                $this->em->flush();

                $this->addFlash('success', '<i class="fa fa-edit"></i> Dossier modifié avec succès !');

                return $this->redirectToRoute('ag_vault_folder_show', array(
                    'id' => $folder->getId(),
                    'slug' => $folder->getSlug()
                ));
            }

            $this->addFlash('error', '<i class="fa fa-times-circle"></i> Une erreur s\'est produite.');
        }

        //Retrieve the list of every parents for the current folder
        $listParents = array();
        if (null !== $folder->getParent()) {
            $nextParent = $folder->getParent();
            while (null !== $nextParent):
                $listParents[] = $nextParent;
                $nextParent = $nextParent->getParent();
            endwhile;
            $listParents = array_reverse($listParents);
        }

        return array(
            'form' => $form->createView(),
            'folder' => $folder,
            'listParents' => $listParents
        );
    }

    /**
     * @param Folder $folder
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function removeAction(Folder $folder)
    {
        if ($this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Ce dossier ne vous appartient pas.");

        $form = $this->createFormBuilder()->getForm();

        if ($form->handleRequest($this->request)->isValid()) {
            $params = $this->request->request->all();
            if ($params['keepordelete'] == "keep") {
                foreach ($folder->getFiles() as $file) {
                    $file->setFolder(null);
                    $this->em->persist($file);
                }
                foreach ($folder->getChildren() as $child) {
                    $child->setParent(null);
                    $this->em->persist($child);
                }
                $this->em->flush();
            }
            else {
                foreach ($folder->getFiles() as $file) {
                    unlink($file->getAbsolutePath());
                    $this->em->remove($file);
                }
                $this->em->flush();
            }

            $this->em->remove($folder);
            $this->em->flush();

            $this->addFlash('danger', '<i class="fa fa-trash"></i> Dossier supprimé avec succès !');

            return $this->redirectToRoute('ag_vault_homepage');
        }

        return array(
            'form' => $form->createView(),
            'folder' => $folder
        );
    }

    /**
     * @param Folder $folder
     * @return JsonResponse
     * @Secure(roles="ROLE_ADMIN")
     */
    public function renameAction(Folder $folder)
    {
        if ($this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $name = $this->request->query->get('name', null);

        $response = array(
            'success' => 0,
        );

        if (null !== $name) {
            $folder->setName($name);
            $this->em->persist($folder);
            $this->em->flush();

            $response['success'] = 1;
            $response['id'] = $folder->getId();
            $response['name'] = $folder->getName();
            $response['type'] = 'folder';
            $response['route'] = $this->generateUrl('ag_vault_folder_show', array(
                'id' => $folder->getId(),
                'slug' => $folder->getSlug(),
            ), UrlGenerator::ABSOLUTE_URL);
        }

        return new JsonResponse($response);
    }

    /**
     * @param Folder $folder
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function moveAction(Folder $folder)
    {
        if ($this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Ce fichier ne vous appartient pas.");

        $form = $this->createForm(new FolderEditType($folder), $folder);
        $formerFolder = $folder->getParent();

        if ($this->request->isMethod('POST')) {
            $form->handleRequest($this->request);

            if ($form->isValid()) {
                $this->em->persist($folder);
                $this->em->flush();

                $this->addFlash('success', '<i class="fa fa-arrows"></i> Emplacement du dossier modifé avec succès !');

                return null !== $formerFolder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $formerFolder->getId(), 'slug' => $formerFolder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }

            $this->addFlash('danger', '<i class="fa fa-times-circle"></i> Une erreur est survenue. Veuillez contacter le big boss pour un petit service après-vente qui mets dans le bien.');
        }

        //Retrieve the list of every parents for the current folder
        $listParents = array();
        $nextParent = $folder->getParent();
        while (null !== $nextParent) {
            $listParents[] = $nextParent;
            $nextParent = $nextParent->getParent();
        }
        $listParents = array_reverse($listParents);

        return array(
            'folder' => $folder,
            'form' => $form->createView(),
            'listParents' => $listParents,
        );
    }
}
