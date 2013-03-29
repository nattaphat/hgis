<?php

namespace Haii\IgisBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use FOS\UserBundle\FOSUserBundle;

class HaiiIgisBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
