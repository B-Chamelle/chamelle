<?php

namespace Chamelle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

/*
 * Controls everything that happens BEFORE authentication
 * (including authentication itself).
 */
class BaseController extends Controller
{
    public function homeAction()
    {
        return $this->render('ChamelleUserBundle:Base:home.html.twig');
    }
    
    
    public function registerAction()
    {
        $error = NULL;
        return $this->render('ChamelleUserBundle:Base:register.html.twig', array('error' => $error));
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

        return $this->render('ChamelleUserBundle:Base:login.html.twig', array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error
        ));
    }
    
    
    public function lostpwdAction()
    {
        return $this->render('ChamelleUserBundle:Base:lostpwd.html.twig');
    }
}
