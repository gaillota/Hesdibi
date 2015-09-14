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
     */
    public function indexAction()
    {
        return array(
            'listFolders' => $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
                'owner' => $this->getUser(),
            ), array(
                'name' => 'ASC'
            )),
        );
    }

    /**
     * @param Folder $folder
     * @return array
     * @Template
     * @ParamConverter("folder", options={"mapping":{"id": "id", "slug": "slug"}})
     */
    public function showAction(Folder $folder = null)
    {
        if (null !== $folder && $this->getUser() !== $folder->getOwner())
            throw new AccessDeniedException("Ce dossier ne vous appartient pas.");

        $search = $this->request->query->get('s', null);

        if (null !== $search && empty($search)) {
            return null !== $folder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $folder->getId(), 'slug' => $folder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
        }

        $newFolder = new Folder;
        $newFolder->setParent($folder);
        $formFolder = $this->createForm(new FolderType, $newFolder);

        $file = new File;
        $file->setFolder($folder);
        $formFile = $this->createForm(new FileType, $file);

        if ($this->request->isMethod('POST')) {
            $formFolder->handleRequest($this->request);
            $formFile->handleRequest($this->request);

            if ($formFolder->isValid()) {
                $this->em->persist($newFolder);
                $this->em->flush();

                return $this->redirectToRoute('ag_vault_folder_show', array(
                    'id' => $newFolder->getId(),
                    'slug' => $newFolder->getSlug()
                ));
            }

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

            $this->addFlash('danger', 'Une erreur est survenue.');
        }

        if(!empty($search)) {
            $listFolders = $this->em->getRepository('AGVaultBundle:Folder')->findSearch($search, $folder);

            $listFiles = $this->em->getRepository('AGVaultBundle:File')->findSearch($search, $folder);
        } else {
            $listFolders = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
                'parent' => $folder,
            ), array(
                'name' => 'ASC'
            ));
            $listFiles = $this->em->getRepository('AGVaultBundle:File')->findBy(array(
                'folder' => $folder,
            ), array(
                'name' => 'ASC'
            ));
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

        $size  = null !== $folder ? $folder->getSize() : $this->em->createQuery("SELECT SUM(f.size) FROM AG\VaultBundle\Entity\File f")->getSingleScalarResult();

        return array(
            'folder' => $folder,
            'formFolder' => $formFolder->createView(),
            'formFile' => $formFile->createView(),
            'listFolders' => $listFolders,
            'listFiles' => $listFiles,
            'listParents' => $listParents,
            'search' => $search,
            'size' => $size,
        );
    }

    /**
     * @param Folder $folder
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
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

                $this->addFlash('success', 'Dossier modifié avec succès !');

                return $this->redirectToRoute('ag_vault_folder_show', array(
                    'id' => $folder->getId(),
                    'slug' => $folder->getSlug()
                ));
            }

            $this->addFlash('error', 'Une erreur s\'est produite.');
        }

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

            $this->addFlash('danger', 'Dossier supprimé avec succès !');

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

                $this->addFlash('success', 'Emplacement du dossier modifé avec succès !');

                return null !== $formerFolder ? $this->redirectToRoute('ag_vault_folder_show', array('id' => $formerFolder->getId(), 'slug' => $formerFolder->getSlug())) : $this->redirectToRoute('ag_vault_homepage');
            }

            $this->addFlash('danger', 'Une erreur est survenue. Veuillez contacter le big boss pour un petit service après-vente qui mets dans le bien.');
        }

        return array(
            'folder' => $folder,
            'form' => $form->createView(),
        );
    }
}
