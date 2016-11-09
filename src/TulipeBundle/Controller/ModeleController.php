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
            $em->flush();

            return $this->redirectToRoute('modele_index', array('id' => $modele->getId()));
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
        $em = $this->getDoctrine()->getEntityManager();
        $image = $em->getRepository('TulipeBundle:Image')->findOneById($modele->getImage()->getId());
        $editForm = $this->createForm('TulipeBundle\Form\ModeleType', $modele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $image->preUpload();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('modele_index', array('id' => $modele->getId()));
        }

        return $this->render('@Tulipe/Admin/modele/edit.html.twig', array(
            'modele' => $modele,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Modele entity.
     *
     */

    public function deleteAction($id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getEntityManager();
// Recherche LE MODELE à supprimer parmi LES MODELES
            $modele = $em->getRepository('TulipeBundle:ModeleBundle:Modele')->findOneById($id);
// Recherche L'IMAGE DU MODELE visé
            $image = $em->getRepository('TulipeBundle:ImageBundle:Image')->findOneById($modele->getImage()->getId());
// Supprime LE MODELE et SON IMAGE associée
            $em->remove($modele);
            $em->remove($image);
// Envoie la requête à la BDD
            $em->flush();

            return $this->redirectToRoute('modele_index');
        } else
            return $this->redirectToRoute('modele_index');

    }
}
