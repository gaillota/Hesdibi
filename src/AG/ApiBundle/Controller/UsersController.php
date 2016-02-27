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
     * Récupérer tous les utilisateurs
     *
     * @ApiDoc(
     *     section="Utilisateurs",
     *     description="Récupére tous les utilisateurs"
     * )
     * @Get()
     */
    public function getUsersAction()
    {
        $users = $this->get('fos_user.user_manager')->findUsers();

        return $users;
    }

    /**
     * Récupérer l'utilisateur correspondant à l'id $id
     *
     * @ApiDoc(
     *     section="Utilisateurs",
     *     description="Récupèrer un utilisateur",
     *     requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="ID de l'utilisateur"
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
     * Créer un nouvel utilisateur
     *
     * @ApiDoc(
     *     section="Utilisateurs",
     *     description="Créer un nouvel utilisateur",
     *     parameters={
     *          {
     *              "name"="username",
     *              "dataType"="String",
     *              "required"=true,
     *              "description"="Le pseudo de l'utilisateur"
     *          },
     *          {
     *              "name"="email",
     *              "dataType"="String",
     *              "required"=true,
     *              "description"="L'adresse mail de l'utilisateur"
     *          }
     *     }
     * )
     *
     * @Post()
     */
    public function createUserAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setEnabled(true);

        $form = $this->createForm(new UserType, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //Generate random password of 8 characters
            $password = bin2hex(openssl_random_pseudo_bytes(4));
            //Set random password to the user
            $user->setPlainPassword($password);

            $userManager->updateUser($user);

            $response = array(
                'Utilisateur crée avec succès'
            );

            if (!$this->container->hasParameter('mailgun_api_key')) {
                array_push($response, 'Mailgun API key manquante !');

                return new Response($response);
            }

            //Send confirmation mail to user
            $mg = new Mailgun($this->container->getParameter('mailgun_api_key'));
            $domain = $this->container->hasParameter('domain_name') ? $this->container->getParameter('domain_name') : 'hesdibi.co';

            $message = array(
                'from'      => 'no-reply@antoine-gaillot.com',
                'to'        => $user->getEmail(),
                'subject'   => 'Votre compte a bien été crée - My Vault',
                'html'      => $this->renderView(
                    'AGUserBundle:Mail:add.html.twig',
                    array(
                        'user' => $user,
                        'password' => $password,
                        'login' => $this->generateUrl('fos_user_security_login', array(), UrlGeneratorInterface::ABSOLUTE_URL),
                        'changePassword' => $this->generateUrl('fos_user_change_password', array(), UrlGeneratorInterface::ABSOLUTE_URL),
                    )
                )
            );

            $mg->sendMessage($domain, $message);

            $result = $mg->get("$domain/log", array(
                    'limit' => 1,
                    'skip'  => 0)
            );

            if ($result->http_response_code == 200) {
                array_push($response, 'E-mail envoyé avec succès !');
            } else {
                array_push($response, 'Erreur lors de l\'envoi de l\'email');
            }


            return new Response($response);
        }

        return View::create($form, 400);
    }
}