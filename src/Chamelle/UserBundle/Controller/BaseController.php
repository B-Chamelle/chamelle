<?php

namespace Chamelle\UserBundle\Controller;

use Chamelle\UserBundle\Entity\User;

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
    
    
    public function createAction()
    {
        // Checking request
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST')
        {
            //TODO: form validation
            
            // Create user
            $em = $this->getDoctrine()->getManager();

            $user = new User;
            $user->setName($request->get('name'));
            $user->setEmail($request->get('email'));
            
            // Cypher
            $cypher = $this->container->get('chamelle.user.cypher');
            $salt = $cypher->generateSalt();
            $encodedPwd = $cypher->encodePassword($request->get('password'), $salt);
            
            $user->setSalt($salt);
            $user->setPassword($encodedPwd);
            
            // Persisting user
            $em->persist($user);
            $em->flush();

            // TODO: If creation succeeds: send email with activation link
            //$mailer = $this->container->get('mailer');

            // Adding temp message (TODO: "email sent")
            $this->get('session')->getFlashBag()->add('success', "Your account has successfully been created.");
        }
        else
        {
            // Adding failure temporary message
            $this->get('session')->getFlashBag()->add('fail', "EPIC FAIL!");
        }
        // Redirecting to home page
        return $this->redirect($this->generateUrl('chamelle_home'));
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
