<?php

namespace Haii\IgisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HaiiIgisBundle:Igis:index.html.twig');
    }

	public function addUserFormAction()
	{
		return $this->render('HaiiIgisBundle:Igis:adduserform.html.twig');
	}
	
	public function addUserAction()
	{
		return $this->render('HaiiIgisBundle:Igis:adduserform.html.twig');
	}
	
	// public function load(ObjectManager $manager)
	//     {
	//         $user = new User();
	//         $user->setUsername('admin');
	//         $user->setSalt(md5(uniqid()));
	// 
	//         $encoder = $this->container
	//             ->get('security.encoder_factory')
	//             ->getEncoder($user)
	//         ;
	//         $user->setPassword($encoder->encodePassword('secret', $user->getSalt()));
	// 
	//         $manager->persist($user);
	//         $manager->flush();
	//     }
}
