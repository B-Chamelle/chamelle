<?php

namespace Chamelle\ThreadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ThreadController extends Controller
{
    public function listAction()
    {
        return $this->render('ChamelleThreadBundle:Thread:list.html.twig');
    }
}
