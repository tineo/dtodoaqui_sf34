<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bussiness;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bussiness controller.
 *
 * @Route("admin/bussiness")
 */
class BussinessController extends Controller
{
    /**
     * Lists all bussiness entities.
     *
     * @Route("/", name="admin_bussiness_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bussinesses = $em->getRepository('AppBundle:Bussiness')->findAll();

        return $this->render('bussiness/index.html.twig', array(
            'bussinesses' => $bussinesses,
        ));
    }

    /**
     * Creates a new bussiness entity.
     *
     * @Route("/new", name="admin_bussiness_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bussiness = new Bussiness();
        $form = $this->createForm('AppBundle\Form\BussinessType', $bussiness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bussiness);
            $em->flush();

            return $this->redirectToRoute('admin_bussiness_show', array('id' => $bussiness->getId()));
        }

        return $this->render('bussiness/new.html.twig', array(
            'bussiness' => $bussiness,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bussiness entity.
     *
     * @Route("/{id}", name="admin_bussiness_show")
     * @Method("GET")
     */
    public function showAction(Bussiness $bussiness)
    {
        $deleteForm = $this->createDeleteForm($bussiness);

        return $this->render('bussiness/show.html.twig', array(
            'bussiness' => $bussiness,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bussiness entity.
     *
     * @Route("/{id}/edit", name="admin_bussiness_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bussiness $bussiness)
    {
        $deleteForm = $this->createDeleteForm($bussiness);
        $editForm = $this->createForm('AppBundle\Form\BussinessType', $bussiness);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_bussiness_edit', array('id' => $bussiness->getId()));
        }

        return $this->render('bussiness/edit.html.twig', array(
            'bussiness' => $bussiness,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bussiness entity.
     *
     * @Route("/{id}", name="admin_bussiness_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bussiness $bussiness)
    {
        $form = $this->createDeleteForm($bussiness);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bussiness);
            $em->flush();
        }

        return $this->redirectToRoute('admin_bussiness_index');
    }

    /**
     * Creates a form to delete a bussiness entity.
     *
     * @param Bussiness $bussiness The bussiness entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bussiness $bussiness)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_bussiness_delete', array('id' => $bussiness->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
