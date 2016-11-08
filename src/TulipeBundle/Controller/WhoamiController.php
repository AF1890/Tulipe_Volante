<?php

namespace TulipeBundle\Controller;

use TulipeBundle\Entity\Whoami;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Whoami controller.
 *
 */
class WhoamiController extends Controller
{
    /**
     * Lists all whoami entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $whoamis = $em->getRepository('TulipeBundle:Whoami')->findAll();

        return $this->render('@Tulipe/Admin/whoami/index.html.twig', array(
            'whoamis' => $whoamis,
        ));
    }

    /**
     * Creates a new whoami entity.
     *
     */
    public function newAction(Request $request)
    {
        $whoami = new Whoami();
        $form = $this->createForm('TulipeBundle\Form\WhoamiType', $whoami);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($whoami);
            $em->flush($whoami);

            return $this->redirectToRoute('whoami_index');
        }

        return $this->render('@Tulipe/Admin/whoami/new.html.twig', array(
            'whoami' => $whoami,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing whoami entity.
     *
     */
    public function editAction(Request $request, Whoami $whoami)
    {
        $deleteForm = $this->createDeleteForm($whoami);
        $editForm = $this->createForm('TulipeBundle\Form\WhoamiType', $whoami);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('whoami_edit', array('id' => $whoami->getId()));
        }

        return $this->render('@Tulipe/Admin/whoami/edit.html.twig', array(
            'whoami' => $whoami,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a whoami entity.
     *
     */
    public function deleteAction(Request $request, Whoami $whoami)
    {
        $form = $this->createDeleteForm($whoami);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($whoami);
            $em->flush($whoami);
        }

        return $this->redirectToRoute('whoami_index');
    }

    /**
     * Creates a form to delete a whoami entity.
     *
     * @param Whoami $whoami The whoami entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Whoami $whoami)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('whoami_delete', array('id' => $whoami->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
