<?php

namespace Haii\HgisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HaiiHgisBundle:Web:index.html.twig', array('name' => $name));
    }
    
    public function homeAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        //$user = $this->get('security.context')->getToken()->getUser();
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        return $this->render('HaiiHgisBundle:Web:index.html.twig', 
                array('user' => $user)
              );
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
