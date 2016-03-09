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

        $folders = $this->em->getRepository('AGVaultBundle:Folder')->apiFindBy($id, $this->getUser()->getId());
        $files = $this->em->getRepository('AGVaultBundle:File')->apiFindBy($id, $this->getUser()->getId());

        return array(
            'folders' => $folders,
            'files' => $files
        );
    }
}