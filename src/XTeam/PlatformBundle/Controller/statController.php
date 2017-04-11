<?php

namespace XTeam\PlatformBundle\Controller;

use XTeam\PlatformBundle\Entity\stat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Stat controller.
 *
 */
class statController extends Controller
{
    /**
     * Lists all stat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stats = $em->getRepository('XTeamPlatformBundle:stat')->findAll();

        return $this->render('stat/index.html.twig', array(
            'stats' => $stats,
        ));
    }

    /**
     * Creates a new stat entity.
     *
     */
    public function newAction(Request $request)
    {
        $stat = new Stat();
        $form = $this->createForm('XTeam\PlatformBundle\Form\statType', $stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stat);
            $em->flush();

            return $this->redirectToRoute('stat_show', array('id' => $stat->getId()));
        }

        return $this->render('stat/new.html.twig', array(
            'stat' => $stat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stat entity.
     *
     */
    public function showAction(stat $stat)
    {
        $deleteForm = $this->createDeleteForm($stat);

        return $this->render('stat/show.html.twig', array(
            'stat' => $stat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stat entity.
     *
     */
    public function editAction(Request $request, stat $stat)
    {
        $deleteForm = $this->createDeleteForm($stat);
        $editForm = $this->createForm('XTeam\PlatformBundle\Form\statType', $stat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stat_edit', array('id' => $stat->getId()));
        }

        return $this->render('stat/edit.html.twig', array(
            'stat' => $stat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stat entity.
     *
     */
    public function deleteAction(Request $request, stat $stat)
    {
        $form = $this->createDeleteForm($stat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stat);
            $em->flush();
        }

        return $this->redirectToRoute('stat_index');
    }

    /**
     * Creates a form to delete a stat entity.
     *
     * @param stat $stat The stat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(stat $stat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stat_delete', array('id' => $stat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
