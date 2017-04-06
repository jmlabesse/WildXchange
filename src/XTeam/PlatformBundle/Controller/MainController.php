<?php

namespace XTeam\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('XTeamPlatformBundle:Main:index.html.twig', array());
    }

}
