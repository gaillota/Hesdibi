<?php

namespace AG\UserBundle\Controller;


use AG\UserBundle\Entity\User;
use AG\UserBundle\Form\UserType;
use Mailgun\Mailgun;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AdminController extends Controller
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
        $users = $this->em->getRepository('AGUserBundle:User')->myFindAll($this->getUser());

        return array(
            'users' => $users,
        );
    }

    /**
     * @return array
     * @Template
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setEnabled(true);
        $form = $this->createForm(new UserType, $user);

        if ($this->request->isMethod('POST') && $form->handleRequest($this->request)->isValid()) {
            //Generate random password of 8 characters
            $password = bin2hex(openssl_random_pseudo_bytes(4));
            $user->setPlainPassword($password);

            $userManager->updateUser($user);

            $this->addFlash('success', 'Utilisateur crée avec succès.');

            $recipient = $user->getEmail();
            $subject = 'Your account has been created - Hesdibi';
            $body = $this->renderView('AGUserBundle:Mail:add.html.twig', array(
                    'user' => $user,
                    'password' => $password,
                    'login' => $this->generateUrl('fos_user_security_login', array(), UrlGeneratorInterface::ABSOLUTE_URL),
                    'changePassword' => $this->generateUrl('fos_user_change_password', array(), UrlGeneratorInterface::ABSOLUTE_URL)
                )
            );

            // Send confirmation email
            $emailWrapper = $this->get('email_wrapper');
            $emailWrapper
                ->setRecipient($recipient)
                ->setSubject($subject)
                ->setBody($body)
            ;

            if ($emailWrapper->send()) {
                $this->addFlash('success', 'E-mail successfully sent !');
            } else {
                $this->addFlash('danger', 'Error while sending the e-mail.');
            }

            return $this->redirect($this->generateUrl('ag_user_admin_index'));
        }

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @param User $user
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function editAction(User $user)
    {
        $form = $this->createForm(new UserType, $user);

        if ($this->request->isMethod('POST')) {
            if ($form->handleRequest($this->request)->isValid()) {
                $userManager = $this->get('fos_user.user_manager');
                $userManager->updateUser($user);
                $this->addFlash('warning', 'User updated.');

                return $this->redirect($this->generateUrl('ag_user_admin_index'));
            }
        }
        return array(
            'form' => $form->createView(),
            'user' => $user,
        );
    }

    /**
     * @param User $user
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function removeAction(User $user)
    {
        $form = $this->createFormBuilder()->getForm();

        if ($this->request->isMethod('POST')) {
            if ($form->handleRequest($this->request)->isValid()) {
                $this->em->remove($user);
                $this->em->flush();
                $this->addFlash('danger', 'User successfully removed.');

                return $this->redirectToRoute('ag_user_admin_index');
            }
        }

        return array(
            'form' => $form->createView(),
            'user' => $user,
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function generateApiKeyAction()
    {
        $user = $this->getUser();

        $user->generateApiKey();

        $this->get('fos_user.user_manager')->updateUser($user);

        $this->addFlash('success', 'You api key is now set.');
        return $this->redirectToRoute('fos_user_profile_show');
    }
}
