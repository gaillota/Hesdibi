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
     * Récupére tous les fichiers contenus dans un dossier
     *
     * @ApiDoc(
     *      section="Dossiers",
     *      requirements={
     *          {
     *              "name"="api_key",
     *              "dataType"="string",
     *              "requirement"="api_\d+",
     *              "description"="Votre clé d'API"
     *          },
     *          {
     *              "name"="folder_id",
     *              "dataType"="integer",
     *              "description"="ID du dossier"
     *          }
     *      },
     *      description="Récupére tous les fichiers d'un dossier"
     * )
     * @Get()
     */
    public function getFilesAction($api_key, $id)
    {
        $user = $this->get('fos_user.user_manager')->findUserBy(array(
            'apiKey' => $api_key
        ));

        if (null == $user) {
            throw new AccessDeniedException('You are not allowed to access this page');
        }

        $files = $this->em->getRepository('AGVaultBundle:File')->findBy(array(
            'folder' => $id,
            'owner' => $user->getId()
        ));

        return $files;
    }
}