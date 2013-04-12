<?php

namespace Chamelle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class UserController extends Controller
{
    public function createAction()
    {
        $cypher = $this->container->get('chamelle.user.cypher');
        $request = $this->getRequest();
        
        //Check form
        
        //Create user
        
        //If creation succeeds: send email with activation link
        
        //Return email sent
    }
    
    
    public function accountAction()
    {
        $user = $this->getUser();
        
        $name = "WTF?!";
        if(NULL !== $user)
        {
            $name = $user->getName();
        }
        
        return $this->render('ChamelleUserBundle:User:account.html.twig', array('name' => $name));
    }
}
