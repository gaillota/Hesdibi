<?php

namespace AG\VaultBundle\Twig;


class DateFrExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('date_fr', array(
                $this,
                'dateFrGenerator'
            ))
        );
    }

    public function dateFrGenerator(\DateTime $dateTime)
    {
        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $months = array('N/C', 'january', 'february', 'march', 'april', 'mai', 'june', 'july', 'august', 'september', 'october', 'november', 'décember');
        return $days[$dateTime->format("w")] . " " . $dateTime->format("j") . " " . $months[$dateTime->format("n")] . " " . $dateTime->format("Y");
    }

    public function getName()
    {
        return 'fate_fr_extension';
    }
} 