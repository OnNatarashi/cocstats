<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Hdv;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Hdv controller.
 *
 * @Route("hdv")
 */
class HdvController extends Controller
{
    /**
     * Lists all hdv entities.
     *
     * @Route("/", name="hdv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hdvs = $em->getRepository('BackendBundle:Hdv')->findAll();

        return $this->render('hdv/index.html.twig', array(
            'hdvs' => $hdvs,
        ));
    }

    /**
     * Creates a new hdv entity.
     *
     * @Route("/new", name="hdv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hdv = new Hdv();
        $form = $this->createForm('BackendBundle\Form\HdvType', $hdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hdv);
            $em->flush();

            return $this->redirectToRoute('hdv_show', array('id' => $hdv->getId()));
        }

        return $this->render('hdv/new.html.twig', array(
            'hdv' => $hdv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hdv entity.
     *
     * @Route("/{id}", name="hdv_show")
     * @Method("GET")
     */
    public function showAction(Hdv $hdv)
    {
        $deleteForm = $this->createDeleteForm($hdv);

        return $this->render('hdv/show.html.twig', array(
            'hdv' => $hdv,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hdv entity.
     *
     * @Route("/{id}/edit", name="hdv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Hdv $hdv)
    {
        $deleteForm = $this->createDeleteForm($hdv);
        $editForm = $this->createForm('BackendBundle\Form\HdvType', $hdv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hdv_edit', array('id' => $hdv->getId()));
        }

        return $this->render('hdv/edit.html.twig', array(
            'hdv' => $hdv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hdv entity.
     *
     * @Route("/{id}", name="hdv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Hdv $hdv)
    {
        $form = $this->createDeleteForm($hdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hdv);
            $em->flush();
        }

        return $this->redirectToRoute('hdv_index');
    }

    /**
     * Creates a form to delete a hdv entity.
     *
     * @param Hdv $hdv The hdv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hdv $hdv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hdv_delete', array('id' => $hdv->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
