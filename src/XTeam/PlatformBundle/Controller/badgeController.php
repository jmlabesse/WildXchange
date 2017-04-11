<?php

namespace XTeam\PlatformBundle\Controller;

use XTeam\PlatformBundle\Entity\badge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Badge controller.
 *
 */
class badgeController extends Controller
{
    /**
     * Lists all badge entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $badges = $em->getRepository('XTeamPlatformBundle:badge')->findAll();

        return $this->render('badge/index.html.twig', array(
            'badges' => $badges,
        ));
    }

    /**
     * Creates a new badge entity.
     *
     */
    public function newAction(Request $request)
    {
        $badge = new Badge();
        $form = $this->createForm('XTeam\PlatformBundle\Form\badgeType', $badge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($badge);
            $em->flush();

            return $this->redirectToRoute('badge_show', array('id' => $badge->getId()));
        }

        return $this->render('badge/new.html.twig', array(
            'badge' => $badge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a badge entity.
     *
     */
    public function showAction(badge $badge)
    {
        $deleteForm = $this->createDeleteForm($badge);

        return $this->render('badge/show.html.twig', array(
            'badge' => $badge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing badge entity.
     *
     */
    public function editAction(Request $request, badge $badge)
    {
        $deleteForm = $this->createDeleteForm($badge);
        $editForm = $this->createForm('XTeam\PlatformBundle\Form\badgeType', $badge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('badge_edit', array('id' => $badge->getId()));
        }

        return $this->render('badge/edit.html.twig', array(
            'badge' => $badge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a badge entity.
     *
     */
    public function deleteAction(Request $request, badge $badge)
    {
        $form = $this->createDeleteForm($badge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($badge);
            $em->flush();
        }

        return $this->redirectToRoute('badge_index');
    }

    /**
     * Creates a form to delete a badge entity.
     *
     * @param badge $badge The badge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(badge $badge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('badge_delete', array('id' => $badge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
