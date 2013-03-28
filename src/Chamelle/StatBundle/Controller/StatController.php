<?php

namespace Chamelle\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ChamelleStatBundle:Stat:index.html.twig', array('name' => $name));
    }
}
