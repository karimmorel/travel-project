<?php

namespace TravelBundle\Controller;

use TravelBundle\Entity\Voyage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Voyage controller.
 *
 */
class VoyageController extends Controller
{
    /**
     * Lists all voyage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $voyages = $em->getRepository('TravelBundle:Voyage')->findAll();

        return $this->render('voyage/index.html.twig', array(
            'voyages' => $voyages,
        ));
    }

    /**
     * Creates a new voyage entity.
     *
     */
    public function newAction(Request $request)
    {
        $voyage = new Voyage();
        $form = $this->createForm('TravelBundle\Form\VoyageType', $voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();

            return $this->redirectToRoute('voyage_show', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/new.html.twig', array(
            'voyage' => $voyage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a voyage entity.
     *
     */
    public function showAction(Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);

        return $this->render('voyage/show.html.twig', array(
            'voyage' => $voyage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing voyage entity.
     *
     */
    public function editAction(Request $request, Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);
        $editForm = $this->createForm('TravelBundle\Form\VoyageType', $voyage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voyage_edit', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/edit.html.twig', array(
            'voyage' => $voyage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a voyage entity.
     *
     */
    public function deleteAction(Request $request, Voyage $voyage)
    {
        $form = $this->createDeleteForm($voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($voyage);
            $em->flush();
        }

        return $this->redirectToRoute('voyage_index');
    }

    /**
     * Creates a form to delete a voyage entity.
     *
     * @param Voyage $voyage The voyage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Voyage $voyage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voyage_delete', array('id' => $voyage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
