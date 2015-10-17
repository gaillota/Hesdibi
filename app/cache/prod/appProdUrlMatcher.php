<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // ag_vault_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ag_vault_homepage');
            }

            return array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::showAction',  '_route' => 'ag_vault_homepage',);
        }

        // ag_vault_upload
        if ($pathinfo === '/upload') {
            return array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::uploadAction',  '_route' => 'ag_vault_upload',);
        }

        if (0 === strpos($pathinfo, '/f')) {
            if (0 === strpos($pathinfo, '/folder')) {
                // ag_vault_folder_index
                if (rtrim($pathinfo, '/') === '/folder') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'ag_vault_folder_index');
                    }

                    return array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::indexAction',  '_route' => 'ag_vault_folder_index',);
                }

                // ag_vault_folder_show
                if (preg_match('#^/folder/(?P<id>\\d+)(?:\\-(?P<slug>[a-zA-Z0-9-_/]+))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_folder_show')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::showAction',  'slug' => NULL,));
                }

                // ag_vault_folder_edit
                if (preg_match('#^/folder/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_folder_edit')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::editAction',));
                }

                // ag_vault_folder_remove
                if (preg_match('#^/folder/(?P<id>\\d+)/remove$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_folder_remove')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::removeAction',));
                }

                // ag_vault_folder_upload
                if (preg_match('#^/folder/(?P<id>\\d+)/upload$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_folder_upload')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::uploadAction',));
                }

                // ag_vault_folder_rename
                if (preg_match('#^/folder/(?P<id>\\d+)/rename$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_folder_rename')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::renameAction',));
                }

                // ag_vault_folder_move
                if (preg_match('#^/folder/(?P<id>\\d+)/move$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_folder_move')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FolderController::moveAction',));
                }

            }

            if (0 === strpos($pathinfo, '/file')) {
                // ag_vault_file_remove
                if (preg_match('#^/file/(?P<id>\\d+)/remove$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_remove')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::removeAction',));
                }

                // ag_vault_file_download
                if (preg_match('#^/file/(?P<id>\\d+)/download$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_download')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::downloadAction',));
                }

                // ag_vault_file_preview
                if (preg_match('#^/file/(?P<id>\\d+)/preview$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_preview')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::previewAction',));
                }

                // ag_vault_file_rename
                if (preg_match('#^/file/(?P<id>\\d+)/rename$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_rename')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::renameAction',));
                }

                // ag_vault_file_send
                if (preg_match('#^/file/(?P<id>\\d+)/send$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_send')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::sendAction',));
                }

                // ag_vault_file_move
                if (preg_match('#^/file/(?P<id>\\d+)/move$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_move')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::moveAction',));
                }

                // ag_vault_file_details
                if (preg_match('#^/file/(?P<id>\\d+)/details$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_details')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::detailsAction',));
                }

                // ag_vault_file_share_with
                if (preg_match('#^/file/(?P<id>\\d+)/share\\-with$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_share_with')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::shareWithAction',));
                }

                // ag_vault_file_generate_link
                if (preg_match('#^/file/(?P<id>\\d+)/generate\\-link$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_generate_link')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::generateLinkAction',));
                }

                // ag_vault_file_get_links
                if (preg_match('#^/file/(?P<id>\\d+)/get\\-links$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_get_links')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::getLinksAction',));
                }

                // ag_vault_file_show
                if (preg_match('#^/file/(?P<token>[a-z0-9]{40})$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_file_show')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\FileController::showAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/share-link')) {
            // ag_vault_link_all
            if ($pathinfo === '/share-link/all') {
                return array (  '_controller' => 'AG\\VaultBundle\\Controller\\ShareLinkController::allAction',  '_route' => 'ag_vault_link_all',);
            }

            // ag_vault_link_remove
            if (preg_match('#^/share\\-link/(?P<id>\\d+)/remove$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_vault_link_remove')), array (  '_controller' => 'AG\\VaultBundle\\Controller\\ShareLinkController::removeAction',));
            }

        }

        if (0 === strpos($pathinfo, '/admin/users')) {
            // ag_user_admin_index
            if (rtrim($pathinfo, '/') === '/admin/users') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ag_user_admin_index');
                }

                return array (  '_controller' => 'AG\\UserBundle\\Controller\\AdminController::indexAction',  '_route' => 'ag_user_admin_index',);
            }

            // ag_user_admin_add
            if ($pathinfo === '/admin/users/add') {
                return array (  '_controller' => 'AG\\UserBundle\\Controller\\AdminController::addAction',  '_route' => 'ag_user_admin_add',);
            }

            // ag_user_admin_edit
            if (preg_match('#^/admin/users/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_user_admin_edit')), array (  '_controller' => 'AG\\UserBundle\\Controller\\AdminController::editAction',));
            }

            // ag_user_admin_remove
            if (preg_match('#^/admin/users/(?P<id>\\d+)/remove$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ag_user_admin_remove')), array (  '_controller' => 'AG\\UserBundle\\Controller\\AdminController::removeAction',));
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
