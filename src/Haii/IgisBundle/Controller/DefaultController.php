<?php

namespace Haii\IgisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HaiiIgisBundle:Igis:index.html.twig', array('name' => $name));
    }
}
