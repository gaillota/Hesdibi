<?php

namespace EnhancedProxy539f5f81_98c2eb7da9fbe61972bb4fbc5994d96422b978f3\__CG__\AG\VaultBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ShareLinkController extends \AG\VaultBundle\Controller\ShareLinkController
{
    private $__CGInterception__loader;

    public function removeAction(\AG\VaultBundle\Entity\ShareLink $shareLink)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\ShareLinkController', 'removeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($shareLink));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($shareLink), $interceptors);

        return $invocation->proceed();
    }

    public function allAction()
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\ShareLinkController', 'allAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}