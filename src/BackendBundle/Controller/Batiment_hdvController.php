<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Batiment_hdv;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Batiment_hdv controller.
 *
 * @Route("batiment_hdv")
 */
class Batiment_hdvController extends Controller
{
    /**
     * Lists all batiment_hdv entities.
     *
     * @Route("/", name="batiment_hdv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $batiment_hdvs = $em->getRepository('BackendBundle:Batiment_hdv')->findAll();

        return $this->render('batiment_hdv/index.html.twig', array(
            'batiment_hdvs' => $batiment_hdvs,
        ));
    }

    /**
     * Creates a new batiment_hdv entity.
     *
     * @Route("/new", name="batiment_hdv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $batiment_hdv = new Batiment_hdv();
        $form = $this->createForm('BackendBundle\Form\Batiment_hdvType', $batiment_hdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($batiment_hdv);
            $em->flush();

            return $this->redirectToRoute('batiment_hdv_show', array('id' => $batiment_hdv->getId()));
        }

        return $this->render('batiment_hdv/new.html.twig', array(
            'batiment_hdv' => $batiment_hdv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a batiment_hdv entity.
     *
     * @Route("/{id}", name="batiment_hdv_show")
     * @Method("GET")
     */
    public function showAction(Batiment_hdv $batiment_hdv)
    {
        $deleteForm = $this->createDeleteForm($batiment_hdv);

        return $this->render('batiment_hdv/show.html.twig', array(
            'batiment_hdv' => $batiment_hdv,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing batiment_hdv entity.
     *
     * @Route("/{id}/edit", name="batiment_hdv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Batiment_hdv $batiment_hdv)
    {
        $deleteForm = $this->createDeleteForm($batiment_hdv);
        $editForm = $this->createForm('BackendBundle\Form\Batiment_hdvType', $batiment_hdv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('batiment_hdv_edit', array('id' => $batiment_hdv->getId()));
        }

        return $this->render('batiment_hdv/edit.html.twig', array(
            'batiment_hdv' => $batiment_hdv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a batiment_hdv entity.
     *
     * @Route("/{id}", name="batiment_hdv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Batiment_hdv $batiment_hdv)
    {
        $form = $this->createDeleteForm($batiment_hdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($batiment_hdv);
            $em->flush();
        }

        return $this->redirectToRoute('batiment_hdv_index');
    }

    /**
     * Creates a form to delete a batiment_hdv entity.
     *
     * @param Batiment_hdv $batiment_hdv The batiment_hdv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Batiment_hdv $batiment_hdv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('batiment_hdv_delete', array('id' => $batiment_hdv->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
