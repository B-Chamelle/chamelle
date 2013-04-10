<?php

namespace Chamelle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class UserController extends Controller
{
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
    
    
    public function createAction()
    {
        //Check form
        
        //Create user
        
        //If creation succeeds: send email with activation link
        
        //Return email sent
    }
    
    
    public function loginAction()
    {
        // If already connected, redirection to home page
        if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED'))
        {
            return $this->redirect($this->generateUrl('chamelle_home'));
        }

        $request = $this->getRequest();
        $session = $request->getSession();

        // Checking authentification errors from previous form submition
        if($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR))
        {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        else
        {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('ChamelleUserBundle:User:login.html.twig', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error
        ));
    }
}
