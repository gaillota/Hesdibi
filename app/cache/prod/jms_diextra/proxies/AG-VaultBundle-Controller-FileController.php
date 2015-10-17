<?php

namespace EnhancedProxy539f5f81_d873e16ea70fcd8984a16ecf4342da3e8c65cbbd\__CG__\AG\VaultBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class FileController extends \AG\VaultBundle\Controller\FileController
{
    private $__CGInterception__loader;

    public function uploadAction(\AG\VaultBundle\Entity\Folder $folder = NULL)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'uploadAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($folder));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($folder), $interceptors);

        return $invocation->proceed();
    }

    public function shareWithAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'shareWithAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function sendAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'sendAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function renameAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'renameAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function removeAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'removeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function moveAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'moveAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function getLinksAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'getLinksAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function generateLinkAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'generateLinkAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function detailsAction(\AG\VaultBundle\Entity\File $file)
    {
        $ref = new \ReflectionMethod('AG\\VaultBundle\\Controller\\FileController', 'detailsAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($file));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($file), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}