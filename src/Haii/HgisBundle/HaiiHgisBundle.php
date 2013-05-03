<?php

namespace Haii\HgisBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HaiiHgisBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
