<?php

namespace XTeam\PlatformBundle\Controller;

use XTeam\PlatformBundle\Entity\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Response controller.
 *
 */
class ResponseController extends Controller
{
    /**
     * Lists all response entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $responses = $em->getRepository('XTeamPlatformBundle:Response')->findAll();

        return $this->render('response/index.html.twig', array(
            'responses' => $responses,
        ));
    }

    /**
     * Creates a new response entity.
     *
     */
    public function newAction(Request $request)
    {
        $response = new Response();
        $form = $this->createForm('XTeam\PlatformBundle\Form\ResponseType', $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush();

            return $this->redirectToRoute('response_show', array('id' => $response->getId()));
        }

        return $this->render('response/new.html.twig', array(
            'response' => $response,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a response entity.
     *
     */
    public function showAction(Response $response)
    {
        $deleteForm = $this->createDeleteForm($response);

        return $this->render('response/show.html.twig', array(
            'response' => $response,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing response entity.
     *
     */
    public function editAction(Request $request, Response $response)
    {
        $deleteForm = $this->createDeleteForm($response);
        $editForm = $this->createForm('XTeam\PlatformBundle\Form\ResponseType', $response);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('response_edit', array('id' => $response->getId()));
        }

        return $this->render('response/edit.html.twig', array(
            'response' => $response,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a response entity.
     *
     */
    public function deleteAction(Request $request, Response $response)
    {
        $form = $this->createDeleteForm($response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($response);
            $em->flush();
        }

        return $this->redirectToRoute('response_index');
    }

    /**
     * Creates a form to delete a response entity.
     *
     * @param Response $response The response entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Response $response)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('response_delete', array('id' => $response->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function voteAction(){
        //recup id user
        $user=$this->getUser()->getId();
        //recup id response

        $em = $this->getDoctrine()->getManager();
        $response= $this->getResponse();
        $response= $em->getRepository('XTeamPlatformBundle:Vote')->findBy();
        //update bdd av new entree ds vote
        // recup new valeur vote
        //retour json
    }
}
