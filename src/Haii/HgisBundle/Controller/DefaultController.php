<?php

namespace Haii\HgisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HaiiHgisBundle:Default:index.html.twig', array('name' => $name));
    }
}
