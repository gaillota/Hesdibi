<?php


namespace AG\ApiBundle\Controller;


use AG\ApiBundle\Form\UserType;
use AG\UserBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\View\View;
use Mailgun\Mailgun;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UsersController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Get a list of all the users
     *
     * @ApiDoc(
     *     section="Users",
     *     description="Get all the users"
     * )
     */
    public function getUsersAction()
    {
        $users = $this->get('fos_user.user_manager')->findUsers();

        return array(
            'users' => $users
        );
    }

    /**
     * Get the user {id}
     *
     * @ApiDoc(
     *     section="Users",
     *     description="Get a user",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="User ID"
     *          }
     *     }
     * )
     */
    public function getUserAction($id)
    {
        $user = $this->get('fos_user.user_manager')->findUserBy(array(
            'id' => $id
        ));

        return $user;
    }

    /**
     * Create a new user
     *
     * @ApiDoc(
     *     section="Users",
     *     description="Create a new user",
     *     parameters={
     *          {
     *              "name"="username",
     *              "dataType"="String",
     *              "required"=true,
     *              "description"="Username"
     *          },
     *          {
     *              "name"="email",
     *              "dataType"="String",
     *              "required"=true,
     *              "description"="E-mail address"
     *          }
     *     }
     * )
     *
     * @Post()
     */
    public function createUserAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setEnabled(true);

        $form = $this->createForm(new UserType, $user);
        $form->handleRequest($this->request);

        if ($form->isValid()) {
            //Generate random password of 8 characters
            $password = bin2hex(openssl_random_pseudo_bytes(4));
            //Set random password to the user
            $user->setPlainPassword($password);

            $userManager->updateUser($user);

            $response = array(
                'Utilisateur crée avec succès'
            );

            //Send confirmation mail to user
            $recipient = $user->getEmail();
            $subject = 'Your account has been created - Hesdibi';
            $body = $this->renderView('AGUserBundle:Mail:add.html.twig', array(
                    'user' => $user,
                    'password' => $password,
                    'login' => $this->generateUrl('fos_user_security_login', array(), UrlGeneratorInterface::ABSOLUTE_URL),
                    'changePassword' => $this->generateUrl('fos_user_change_password', array(), UrlGeneratorInterface::ABSOLUTE_URL),
                )
            );

            $emailWrapper = $this->get('email_wrapper');
            $emailWrapper
                ->setRecipient($recipient)
                ->setSubject($subject)
                ->setBody($body)
            ;

            $response[] = $emailWrapper->send() ? 'E-mail successfully sent' : 'Error while sending the e-mail';

            return new Response($response);
        }

        return View::create($form, 400);
    }
}