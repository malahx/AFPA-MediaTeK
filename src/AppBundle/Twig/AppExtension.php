<?php

namespace AppBundle\Twig;

use DateTime;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('fromNow', array($this, 'timeCalculation')),
        );
    }

    public function timeCalculation($date)
    {
        $now = new DateTime();

        return (abs($date->getTimestamp() - $now->getTimestamp()));
    }

    public function getName()
    {
        return 'app_extension';
    }
}