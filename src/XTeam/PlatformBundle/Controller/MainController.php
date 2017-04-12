<?php

namespace XTeam\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('XTeamPlatformBundle:Main:index.html.twig', array());
    }
    public function docsAction()
    {
        return $this->render('XTeamPlatformBundle:Main:docs.html.twig', array());
    }

    public function newqAction() {
        return $this->render('XTeamPlatformBundle:Main:newQ.html.twig', array());
    }

    public function questionresponseAction()
    {
        return $this->render('XTeamPlatformBundle:Main:questionresponse.html.twig', array());
    }

    public function showFaqAction()
    {
        return $this->render('XTeamPlatformBundle:Main:faq.html.twig', array());
    }

    public function showContactAction()
    {
        return $this->render('XTeamPlatformBundle:Main:contact.html.twig', array());
    }
}
