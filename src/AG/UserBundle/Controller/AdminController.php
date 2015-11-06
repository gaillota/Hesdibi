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
        $users = $this->em->getRepository('AGUserBundle:User')->findAll();

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
            //Set random password to the user
            $user->setPlainPassword($password);

//            $encryptionService = $this->get('ag_vault.encryption_service');
//
//            $encryptionService->setupEncryptionRequirements($password);

            $userManager->updateUser($user);

            $this->addFlash('success', 'Utilisateur crée avec succès.');

            //Send confirmation mail to user
            $mg = new Mailgun($this->container->getParameter('mailgun_api_key'));
            $domain = $this->container->getParameter('domain_name');

            $message = array(
                'from'      => 'no-reply@antoine-gaillot.com',
                'to'        => $user->getEmail(),
                'subject'   => 'Votre compte a bien été crée - My Vault',
                'html'      => $this->renderView(
                    'AGUserBundle:Mail:add.html.twig',
                    array(
                        'user' => $user,
                        'password' => $password,
                        'homepage' => $this->generateUrl('ag_vault_homepage', array(), UrlGeneratorInterface::ABSOLUTE_URL),
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
                $this->addFlash('success', 'E-mail envoyé avec succès !');
            } else {
                $this->addFlash('danger', 'Erreur lors de l\'envoi de l\'email');
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
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction(User $user)
    {
        $form = $this->createForm(new UserType, $user);

        if ($this->request->isMethod('POST')) {
            if ($form->handleRequest($this->request)->isValid()) {
                $userManager = $this->get('fos_user.user_manager');
                $userManager->updateUser($user);
                $this->addFlash('warning', 'Utilisateur mis à jour.');

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
     * @Secure(roles="ROLE_ADMIN")
     */
    public function removeAction(User $user)
    {
        $form = $this->createFormBuilder()->getForm();

        if ($this->request->isMethod('POST')) {
            if ($form->handleRequest($this->request)->isValid()) {
                $this->em->remove($user);
                $this->em->flush();
                $this->addFlash('danger', 'Utilisateur supprimé avec succès.');

                return $this->redirectToRoute('ag_user_admin_index');
            }
        }

        return array(
            'form' => $form->createView(),
            'user' => $user,
        );
    }

//    /**
//     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
//     * @Template
//     * @Secure(roles="ROLE_ADMIN")
//     */
//    public function setupEncryptionSettingsAction($password)
//    {
//        $user = $this->getUser();
//
//        $encryptedKey = $user->getEncryptedKey();
//
//        if (null !== $encryptedKey) {
//            $this->addFlash('danger', 'Your already have your encryption settings set up');
//            return $this->redirectToRoute('ag_user_admin_index');
//        }
//
//        $serviceEncryption = $this->get('ag_vault.encryption_service');
//
//        $passwordValidatorAndKey = $serviceEncryption->getPasswordValidator($password, $user->getSalt());
//        $passwordValidator = $passwordValidatorAndKey['passwordValidator'];
//        $user
//            ->setPasswordValidator($passwordValidator)
//            ->setIv($serviceEncryption->generateIV())
//        ;
//        $encryptionKey = $passwordValidatorAndKey['encryptionKey'];
//
//        $key = $serviceEncryption->generateFileEncryptionKey();
//
//        $encryptedKey = $serviceEncryption->encryptEncryptionKey($encryptionKey, $key, $user->getIv());
//        $user->setEncryptedKey($encryptedKey);
//
//        $this->get('fos_user.user_manager')->updateUser($user);
//
//        $this->addFlash('success', 'Encryption settings successfully setup !');
//        return $this->redirectToRoute('ag_user_admin_index');
//    }
//
//    public function editEncryptionSettingsAction($password, $newPassword)
//    {
//        $user = $this->getUser();
//
//        $encryptedKey = $user->getEncryptedKey();
//
//        if (null === $encryptedKey) {
//            $this->addFlash('danger', 'You need to set your encryption settings up first');
//            return $this->redirectToRoute('ag_user_admin_index');
//        }
//
//        $serviceEncryption = $this->get('ag_vault.encryption_service');
//
//        $passwordValidatorAndKey = $serviceEncryption->getPasswordValidator($password, $user->getSalt());
//
//        $key = $serviceEncryption->decryptFileEncryptionKey()
//
//        if ($passwordValidator != $user->getPasswordValidator()) {
//            $this->addFlash('danger', 'Wrong password !');
//            return $this->redirectToRoute('ag_user_admin_index');
//        }
//
//        // Retrieve user's file encryption key
//        $key = $serviceEncryption->decryptFileEncryptionKey($encryptionKey, $user->getEncryptedKey(), $user->getIv());
//
//        $passwordValidatorAndKey = $serviceEncryption->getPasswordValidator($newPassword, $user->getSalt());
//        $passwordValidator = $passwordValidatorAndKey['passwordValidator'];
//        $user->setPasswordValidator($passwordValidator);
//        $iv = $serviceEncryption->generateIV();
//        $user->setIv($iv);
//        $encryptionKey = $passwordValidatorAndKey['encryptionKey'];
//        $encryptedKey = $serviceEncryption->encryptEncryptionKey($encryptionKey, $key, $user->getIv());
//        $user->setEncryptedKey($encryptedKey);
//
//        // Persist user's new settings in database
//        $this->get('fos_user.user_manager')->updateUser($user);
//
//        $this->addFlash('success', 'Encryption settings successfully changed !');
//        return $this->redirectToRoute('ag_user_admin_index');
//    }
}
