<?php

namespace sisconee\AdministracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('sisconeeAdministracionBundle:Default:index.html.twig');
    }
}
