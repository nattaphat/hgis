<?php

namespace Haii\HgisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HaiiHgisBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function emailAction()
    {
        $message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('nhc.cuse@gmail.com')
        ->setTo('nattaphat@gmail.com')
        ->setBody(
                $this->renderView(
                        'HaiiHgisBundle:User:resetting.email.twig'
                )
        )
        ;
        $this->get('mailer')->send($message);
        $name = "Nattaphat";
        return $this->render('HaiiHgisBundle:Default:index.html.twig', array('name' => $name));
    }
}
