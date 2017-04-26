<?php

namespace XTeam\PlatformBundle\Controller;

use XTeam\PlatformBundle\Entity\Comment;
use XTeam\PlatformBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use XTeam\PlatformBundle\Entity\Response;
use XTeam\PlatformBundle\Entity\Tag;
use XTeam\PlatformBundle\Entity\Vote;
use XTeam\PlatformBundle\XTeamPlatformBundle;

/**
 * Question controller.
 *
 */
class QuestionController extends Controller
{
    /**
     * Lists all question entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository('XTeamPlatformBundle:Question')->findAll();

        /**
         * sort by date variable
         *
         */
        $questionsDates= $em->getRepository('XTeamPlatformBundle:Question')->findBy(array(),
            array('date'=>'DESC'));

        return $this->render('question/index.html.twig', array(
            'questions' => $questions,
            'questionsDates' => $questionsDates,
        ));
    }

    /**
     * Creates a new question entity.
     *
     */
    public function newAction(Request $request)
    {
        $question = new Question();
        $form = $this->createForm('XTeam\PlatformBundle\Form\QuestionType', $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('question_show', array('id' => $question->getId()));
        }

        return $this->render('question/new.html.twig', array(
            'question' => $question,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question entity.
     *
     */
    public function showAction(Question $question, Request $request)
    {
        $responseId = $request->get('responseId');
        //var_dump($responseId);

        $deleteForm = $this->createDeleteForm($question);

        $response = new Response();
        $addResponseForm = $this->createForm('XTeam\PlatformBundle\Form\ResponseType', $response);
        $addResponseForm->handleRequest($request);

        $comment = new Comment();
        $commentForm = $this->createForm('XTeam\PlatformBundle\Form\CommentType', $comment);
        $commentForm->handleRequest($request);


        if ($addResponseForm->isSubmitted() && $addResponseForm->isValid()) {
            $response->setQuestion($question)->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush();

            return $this->redirectToRoute('question_show', array('id' => $question->getId()));
        }

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $responseId = $request->get('response_id');
            $response = $em->getRepository('XTeamPlatformBundle:Response')->find($responseId);
            $comment->setUser($this->getUser())->setResponse($response);
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('question_show', array('id' => $question->getId()));
        }

        $hasVoted = false;

        foreach ($this->getUser()->getVotes() as $vote){
           if ($vote->getResponse()->getId() == $responseId ){
               $hasVoted = true;
           }
        }

        if ($responseId != null && $hasVoted == false ){
           $this->vote($responseId);
        }


        return $this->render('question/show.html.twig', array(
            'question' => $question,
            'delete_form' => $deleteForm->createView(),
            'addResponse_form' => $addResponseForm->createView(),
            'comment_form' => $commentForm->createView(),
        ));

    }

    /**
     * Displays a form to edit an existing question entity.
     *
     */
    public function editAction(Request $request, Question $question)
    {
        $deleteForm = $this->createDeleteForm($question);
        $editForm = $this->createForm('XTeam\PlatformBundle\Form\QuestionType', $question);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_edit', array('id' => $question->getId()));
        }

        return $this->render('question/edit.html.twig', array(
            'question' => $question,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a question entity.
     *
     */
    public function deleteAction(Request $request, Question $question)
    {
        $form = $this->createDeleteForm($question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question);
            $em->flush();
        }

        return $this->redirectToRoute('question_index');
    }

    public function searchAction()
    {
        $questionsAll = [];
        $keywords = explode(" ", $_GET['q']);

        $em = $this->getDoctrine()->getManager();

        foreach ($keywords as $keyword) {
            $questions = $em->getRepository('XTeamPlatformBundle:Question')
                ->findQuestionByKeywords($keyword);

            $questionsAll = array_unique(array_merge($questionsAll, $questions));
        }

        return $this->render(':question:search.html.twig', array('questions' => $questionsAll));
    }
    public function showNoResponsesAction() {
        $allNoResponses = $this->findNoResponses();
        return $this->render('XTeamPlatformBundle:Main:responseLess.html.twig',
            array('allNoResponses' => $allNoResponses));
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

    /**
     * Creates a form to delete a question entity.
     * @param Question $question The question entity
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Question $question)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_delete', array('id' => $question->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function vote($response_id){

        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $response = $em->getRepository('XTeamPlatformBundle:Response')->find($response_id);

        $vote= new Vote();
        $vote->setResponse($response)->setUser($user);
        $em->persist($vote);
        $em->flush();

        // recup new valeur vote

    }

}
