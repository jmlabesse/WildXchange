<?php

namespace XTeam\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('XTeamPlatformBundle:Default:index.html.twig');
    }
}
