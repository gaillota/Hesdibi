<?php


namespace AG\ApiBundle\Controller;


use AG\UserBundle\Entity\User;
use AG\VaultBundle\Entity\Folder;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\RestBundle\Controller\Annotations as Rest;

class FoldersController extends FOSRestController
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * Récupérer la liste de tous les dossiers
     *
     * @ApiDoc(
     *     section="Dossiers",
     *     description="Récupérer tous les dossiers"
     * )
     */
    public function getFoldersAction()
    {
        $folders = $this->em->getRepository('AGVaultBundle:Folder')->apiFindAll($this->getUser()->getId());

        return array(
            'folders' => $folders
        );
    }

    /**
     * Récupérer tous les fichiers contenus dans un dossier
     *
     * @ApiDoc(
     *      section="Dossiers",
     *      description="Récupérer le contenu d'un dossier",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="ID du dossier"
     *          }
     *      }
     * )
     * @Get()
     */
    public function getFolderAction($id)
    {
        $folders = $this->em->getRepository('AGVaultBundle:Folder')->apiFindBy($id, $this->getUser()->getId());
//        $folders = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
//            'parent' => $id,
//            'owner' => $this->getUser()->getId()
//        ));
        $files = $this->em->getRepository('AGVaultBundle:File')->apiFindBy($id, $this->getUser()->getId());

        $foldersAndCounts = array();

        foreach ($folders as $folder) {
            $countFoldersDQL = "SELECT COUNT(f.id) FROM AGVaultBundle:Folder f WHERE f.parent = " . $folder["id"];
            $countFolders = $this->em->createQuery($countFoldersDQL)->getSingleScalarResult();

            $countFilesDQL = "SELECT COUNT(f.id) FROM AGVaultBundle:File f WHERE f.folder = " . $folder["id"];
            $countFiles = $this->em->createQuery($countFilesDQL)->getSingleScalarResult();

            $foldersAndCounts[] = array_merge($folder, array(
                'countFolders' => $countFolders,
                'countFiles' => $countFiles
            ));
        }

        return array(
            'folders' => $foldersAndCounts,
            'files' => $files
        );
    }
}