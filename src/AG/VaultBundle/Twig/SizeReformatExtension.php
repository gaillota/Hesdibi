<?php

namespace AG\VaultBundle\Twig;


class SizeReformatExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('size', array(
                $this,
                'sizeReformat'
            ))
        );
    }

    public function sizeReformat($size)
    {
        return $size >= 1000000 ? round($size / 10000) / 100 . 'Mo' : round($size / 1000, 2) . 'ko';
    }

    public function getName()
    {
        return 'size_reformat_extension';
    }
} 