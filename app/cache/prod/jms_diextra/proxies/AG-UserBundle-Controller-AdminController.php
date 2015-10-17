<?php

namespace EnhancedProxy539f5f81_de971009d60115fd642b03aadb323bba69cc0951\__CG__\AG\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class AdminController extends \AG\UserBundle\Controller\AdminController
{
    private $__CGInterception__loader;

    public function removeAction(\AG\UserBundle\Entity\User $user)
    {
        $ref = new \ReflectionMethod('AG\\UserBundle\\Controller\\AdminController', 'removeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($user));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($user), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('AG\\UserBundle\\Controller\\AdminController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction(\AG\UserBundle\Entity\User $user)
    {
        $ref = new \ReflectionMethod('AG\\UserBundle\\Controller\\AdminController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($user));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($user), $interceptors);

        return $invocation->proceed();
    }

    public function addAction()
    {
        $ref = new \ReflectionMethod('AG\\UserBundle\\Controller\\AdminController', 'addAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}