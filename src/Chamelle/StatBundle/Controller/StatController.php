<?php

namespace Chamelle\StatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatController extends Controller
{
    public function statsAction()
    {
        return $this->render('ChamelleStatBundle:Stat:stats.html.twig');
    }
}
