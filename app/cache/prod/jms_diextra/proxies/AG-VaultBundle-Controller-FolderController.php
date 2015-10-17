<?php

namespace EnhancedProxy539f5f81_66223aff406759371a9caa6b7e4baa9bb3372efb\__CG__\AG\VaultBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class FolderController extends \AG\VaultBundle\Controller\FolderController
{
    private $__CGInterception__loader;

    public function renameAction(\AG\VaultBundle\Entity\Folder $folder)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FolderController', 'renameAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($folder));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($folder), $interceptors);

        return $invocation->proceed();
    }

    public function removeAction(\AG\VaultBundle\Entity\Folder $folder)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FolderController', 'removeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($folder));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($folder), $interceptors);

        return $invocation->proceed();
    }

    public function moveAction(\AG\VaultBundle\Entity\Folder $folder)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FolderController', 'moveAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($folder));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($folder), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FolderController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction(\AG\VaultBundle\Entity\Folder $folder)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FolderController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($folder));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($folder), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}