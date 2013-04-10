<?php

namespace Chamelle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class TeamController extends Controller
{
    public function listAction()
    {
        return $this->render('ChamelleUserBundle:Team:list.html.twig');
    }
}
