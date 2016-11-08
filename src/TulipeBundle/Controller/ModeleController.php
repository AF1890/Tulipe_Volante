<?php

namespace TulipeBundle\Controller;

use TulipeBundle\Entity\Modele;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Modele controller.
 *
 */
class ModeleController extends Controller
{
    /**
     * Lists all modele entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modeles = $em->getRepository('TulipeBundle:Modele')->findAll();

        return $this->render('@Tulipe/Admin/modele/index.html.twig', array(
            'modeles' => $modeles,
        ));
    }

    /**
     * Creates a new modele entity.
     *
     */
    public function newAction(Request $request)
    {
        $modele = new Modele();
        $form = $this->createForm('TulipeBundle\Form\ModeleType', $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush($modele);

            return $this->redirectToRoute('modele_new', array('id' => $modele->getId()));
        }

        return $this->render('@Tulipe/Admin/modele/new.html.twig', array(
            'modele' => $modele,
            'form' => $form->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing modele entity.
     *
     */
    public function editAction(Request $request, Modele $modele)
    {
        $deleteForm = $this->createDeleteForm($modele);
        $editForm = $this->createForm('TulipeBundle\Form\ModeleType', $modele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modele_index', array('id' => $modele->getId()));
        }

        return $this->render('modele/edit.html.twig', array(
            'modele' => $modele,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modele entity.
     *
     */
    public function deleteAction(Request $request, Modele $modele)
    {
        $form = $this->createDeleteForm($modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modele);
            $em->flush($modele);
        }

        return $this->redirectToRoute('modele_index');
    }

    /**
     * Creates a form to delete a modele entity.
     *
     * @param Modele $modele The modele entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Modele $modele)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modele_delete', array('id' => $modele->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
