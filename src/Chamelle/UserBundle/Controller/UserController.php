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
    
    
    public function teamsAction()
    {        
        return $this->render('ChamelleUserBundle:User:teams.html.twig');
    }
    
    
    public function loginAction()
    {
        //$encoder = $this->get('chamelle.user.cypher')->getEncoder($user);
        
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED'))
        {
            return $this->redirect($this->generateUrl('chamelle_thread_home'));
        }

        $request = $this->getRequest();
        $session = $request->getSession();

        // On vérifie s'il y a des erreurs d'une précédent soumission du formulaire
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
            // Valeur du précédent nom d'utilisateur rentré par l'internaute
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
}
