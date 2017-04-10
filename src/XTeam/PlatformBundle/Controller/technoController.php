<?php

namespace XTeam\PlatformBundle\Controller;

use XTeam\PlatformBundle\Entity\techno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Techno controller.
 *
 */
class technoController extends Controller
{
    /**
     * Lists all techno entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $technos = $em->getRepository('XTeamPlatformBundle:techno')->findAll();

        return $this->render('techno/index.html.twig', array(
            'technos' => $technos,
        ));
    }

    /**
     * Creates a new techno entity.
     *
     */
    public function newAction(Request $request)
    {
        $techno = new Techno();
        $form = $this->createForm('XTeam\PlatformBundle\Form\technoType', $techno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($techno);
            $em->flush();

            return $this->redirectToRoute('techno_show', array('id' => $techno->getId()));
        }

        return $this->render('techno/new.html.twig', array(
            'techno' => $techno,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a techno entity.
     *
     */
    public function showAction(techno $techno)
    {
        $deleteForm = $this->createDeleteForm($techno);

        return $this->render('techno/show.html.twig', array(
            'techno' => $techno,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing techno entity.
     *
     */
    public function editAction(Request $request, techno $techno)
    {
        $deleteForm = $this->createDeleteForm($techno);
        $editForm = $this->createForm('XTeam\PlatformBundle\Form\technoType', $techno);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('techno_edit', array('id' => $techno->getId()));
        }

        return $this->render('techno/edit.html.twig', array(
            'techno' => $techno,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a techno entity.
     *
     */
    public function deleteAction(Request $request, techno $techno)
    {
        $form = $this->createDeleteForm($techno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($techno);
            $em->flush();
        }

        return $this->redirectToRoute('techno_index');
    }

    /**
     * Creates a form to delete a techno entity.
     *
     * @param techno $techno The techno entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(techno $techno)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('techno_delete', array('id' => $techno->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
