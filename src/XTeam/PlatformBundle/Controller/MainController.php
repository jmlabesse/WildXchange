<?php

namespace XTeam\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $countNoResponses = sizeof($this->findNoResponses());
        return $this->render('XTeamPlatformBundle:Main:index.html.twig', array('countNoResponses' => $countNoResponses));
    }
    public function findNoResponses() {
        $result = [];
        $em = $this->getDoctrine()->getManager();
        $allQuestions = $em->getRepository('XTeamPlatformBundle:Question')->findAll();
        foreach ($allQuestions as $question) {
            if (sizeof($question->getResponses()) == 0){
                $result[] = $question;
            }
        }
        return $result;
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

    public function viewCharteAction()
    {
        return $this->render('XTeamPlatformBundle:Main:charte.html.twig', array());
    }

    public function showFaqAction()
    {
        return $this->render('XTeamPlatformBundle:Main:faq.html.twig', array());
    }

    public function showContactAction()
    {
        return $this->render('XTeamPlatformBundle:Main:contact.html.twig', array());
    }

    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $bestResponse = $em->getRepository('XTeamPlatformBundle:Response')->findBy(['user' => $this->getUser(), 'isCorrect' => 1]);
        $bestResponseCount = sizeof($bestResponse);
        return $this->render('XTeamPlatformBundle:Main:dashboard.html.twig', array('bestresponsecount' => $bestResponseCount));
    }

}
