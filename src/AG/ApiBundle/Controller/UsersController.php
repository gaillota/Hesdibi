<?php


namespace AG\ApiBundle\Controller;


use AG\UserBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;

class UsersController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * Récupérer tous les utilisateurs
     *
     * @ApiDoc(
     *     section="Utilisateurs",
     *     description="Récupére tous les fichiers d'un dossier"
     * )
     * @Get()
     */
    public function getUsersAction()
    {
        $users = $this->get('fos_user.user_manager')->findUsers();

        return $users;
    }

    /**
     * Récupère l'utilisateur ayant l'id $id
     *
     * @ApiDoc(
     *     section="Utilisateurs",
     *     description="Récupère l'utilisateur possédant l'id $id)"
     * )
     */
    public function getUserAction(User $user)
    {
        return $user;
    }

    public function changePassword(User $user)
    {

    }
}