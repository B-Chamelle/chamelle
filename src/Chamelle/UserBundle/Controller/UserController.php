<?php

namespace Chamelle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ChamelleUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
