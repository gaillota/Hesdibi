<?php


namespace AG\ApiBundle\Controller;


use AG\UserBundle\Entity\User;
use AG\VaultBundle\Entity\Folder;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class FoldersController extends Controller
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
        $folders = $this->em->getRepository('AGVaultBundle:Folder')->findBy(array(
            'owner' => $this->getUser()
        ));

        return $folders;
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
        $files = $this->em->getRepository('AGVaultBundle:File')->findBy(array(
            'folder' => $id,
            'owner' => $this->getUser()->getId()
        ));

        return $files;
    }
}