<?php

namespace TulipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TulipeBundle:Default:index.html.twig');
    }
}
