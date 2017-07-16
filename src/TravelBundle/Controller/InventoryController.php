<?php

namespace TravelBundle\Controller;

use TravelBundle\Entity\Inventory;
use TravelBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Inventory controller.
 *
 */
class InventoryController extends Controller
{
    /**
     * Lists all inventory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('TravelBundle:Category')->findAll();

        $inventories = $em->getRepository('TravelBundle:Inventory')->findAll();

        return $this->render('inventory/index.html.twig', array(
            'inventories' => $inventories,
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new inventory entity.
     *
     */
    public function newAction(Request $request)
    {
        $inventory = new Inventory();
        $category = new Category();
        $form = $this->createForm('TravelBundle\Form\InventoryType', $inventory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $inventory->getCategoryId();
            $em = $this->getDoctrine()->getManager();
            $em->persist($inventory);
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('_show', array('id' => $inventory->getId()));
        }

        return $this->render('inventory/new.html.twig', array(
            'inventory' => $inventory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inventory entity.
     *
     */
    public function showAction(Inventory $inventory)
    {
        $categoryName = $inventory->getCategory()->getName();

        $deleteForm = $this->createDeleteForm($inventory);

        return $this->render('inventory/show.html.twig', array(
            'inventory' => $inventory,
            'delete_form' => $deleteForm->createView(),
            'category' => $categoryName,
        ));
    }

    /**
     * Displays a form to edit an existing inventory entity.
     *
     */
    public function editAction(Request $request, Inventory $inventory)
    {
        $deleteForm = $this->createDeleteForm($inventory);
        $editForm = $this->createForm('TravelBundle\Form\InventoryType', $inventory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('_edit', array('id' => $inventory->getId()));
        }

        return $this->render('inventory/edit.html.twig', array(
            'inventory' => $inventory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inventory entity.
     *
     */
    public function deleteAction(Request $request, Inventory $inventory)
    {
        $form = $this->createDeleteForm($inventory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inventory);
            $em->flush();
        }

        return $this->redirectToRoute('_index');
    }

    /**
     * Creates a form to delete a inventory entity.
     *
     * @param Inventory $inventory The inventory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Inventory $inventory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_delete', array('id' => $inventory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
