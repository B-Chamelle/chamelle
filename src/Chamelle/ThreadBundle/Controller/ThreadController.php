<?php

namespace Chamelle\ThreadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ThreadController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ChamelleThreadBundle:Default:index.html.twig', array('name' => $name));
    }
}
