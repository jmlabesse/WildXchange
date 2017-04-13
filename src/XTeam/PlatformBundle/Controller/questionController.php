<?php

namespace XTeam\PlatformBundle\Controller;

use XTeam\PlatformBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Question controller.
 *
 */
class questionController extends Controller
{
    public function addQuestionAction ($date, $question, $isResolve, $user, $titre)
    {
        $em = $this->getDoctrine->getManager();
        $newq = setDate($date);
        $newq = setQuestion($question);
        $newq = setIsResolve($isResolve);
        $newq = setUser($user);
        $newq = setTitre($titre);
    }


}
