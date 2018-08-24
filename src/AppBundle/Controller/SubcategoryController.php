<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Subcategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subcategory controller.
 *
 * @Route("admin/subcategory")
 */
class SubcategoryController extends Controller
{
    /**
     * Lists all subcategory entities.
     *
     * @Route("/", name="subcategory_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subcategories = $em->getRepository('AppBundle:Subcategory')->findAll();

        return $this->render('subcategory/index.html.twig', array(
            'subcategories' => $subcategories,
        ));
    }

    /**
     * Creates a new subcategory entity.
     *
     * @Route("/new", name="subcategory_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subcategory = new Subcategory();
        $form = $this->createForm('AppBundle\Form\SubcategoryType', $subcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subcategory);
            $em->flush();

            return $this->redirectToRoute('subcategory_show', array('id' => $subcategory->getId()));
        }

        return $this->render('subcategory/new.html.twig', array(
            'subcategory' => $subcategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subcategory entity.
     *
     * @Route("/{id}", name="subcategory_show")
     * @Method("GET")
     */
    public function showAction(Subcategory $subcategory)
    {
        $deleteForm = $this->createDeleteForm($subcategory);

        return $this->render('subcategory/show.html.twig', array(
            'subcategory' => $subcategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subcategory entity.
     *
     * @Route("/{id}/edit", name="subcategory_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subcategory $subcategory)
    {
        $deleteForm = $this->createDeleteForm($subcategory);
        $editForm = $this->createForm('AppBundle\Form\SubcategoryType', $subcategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subcategory_edit', array('id' => $subcategory->getId()));
        }

        return $this->render('subcategory/edit.html.twig', array(
            'subcategory' => $subcategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subcategory entity.
     *
     * @Route("/{id}", name="subcategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subcategory $subcategory)
    {
        $form = $this->createDeleteForm($subcategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subcategory);
            $em->flush();
        }

        return $this->redirectToRoute('subcategory_index');
    }

    /**
     * Creates a form to delete a subcategory entity.
     *
     * @param Subcategory $subcategory The subcategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subcategory $subcategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subcategory_delete', array('id' => $subcategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
