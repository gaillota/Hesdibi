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
     * Get the list of every folders
     *
     * @return array
     *
     * @ApiDoc(
     *     section="Folders",
     *     description="Get every folders"
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
     * Get the content the folder {id} (folders and files)
     *
     * @ApiDoc(
     *      section="Folders",
     *      description="Get a folder's content",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Folder ID (0 for root)"
     *          }
     *      }
     * )
     * @Get()
     */
    public function getFolderAction($id)
    {
        if ($id < 0) {
            return $this->createNotFoundException('ID cannot be negative.');
        }

//        $id = $id > 0 ? $id : null;

        $folders = $this->em->getRepository('AGVaultBundle:Folder')->apiFindBy($id, $this->getUser()->getId());
//        $folders = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
//            'parent' => $id,
//            'owner' => $this->getUser()->getId()
//        ));
        $files = $this->em->getRepository('AGVaultBundle:File')->apiFindBy($id, $this->getUser()->getId());

//        var_dump($folders);

//        $foldersAndCounts = array();
//
//        foreach ($folders as $folder) {
//            $countFoldersDQL = "SELECT COUNT(f.id) FROM AGVaultBundle:Folder f WHERE f.parent = " . $folder["id"];
//            $countFolders = $this->em->createQuery($countFoldersDQL)->getSingleScalarResult();
//
//            $countFilesDQL = "SELECT COUNT(f.id) FROM AGVaultBundle:File f WHERE f.folder = " . $folder["id"];
//            $countFiles = $this->em->createQuery($countFilesDQL)->getSingleScalarResult();
//
//            $foldersAndCounts[] = array_merge($folder, array(
//                'countFolders' => $countFolders,
//                'countFiles' => $countFiles
//            ));
//        }

        var_dump($files);

        return array(
            'folders' => $folders,
            'files' => $files
        );
    }
}