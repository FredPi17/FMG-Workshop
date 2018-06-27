<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cour controller.
 *
 * @Route("cours")
 */
class CoursController extends Controller
{
    /**
     * Lists all cours entities.
     *
     * @Route("/", name="cours_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cours = $em->getRepository('AppBundle:Cours')->findAll();

        return $this->render('cours/index.html.twig', array(
            'cours' => $cours,
        ));
    }

    /**
     * Creates a new cours entity.
     *
     * @Route("/new", name="cours_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cours = new Cours();
        $form = $this->createForm('AppBundle\Form\CoursType', $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $cours->getImageFile();
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                __DIR__."/../../../web/uploads/cours",
                $filename
            );
            $cours->setImage($filename);


            $images = $cours->getContenu();
            foreach ($images as $image){
                if($image->getType() == "Image"){
                    $imagef = $image->getImageFile();
                    $filename = md5(uniqid()) . '.' . $imagef->guessExtension();
                    $imagef->move(
                        __DIR__."/../../../web/uploads/cours/contenus",
                        $filename
                    );
                    $image->setImage($filename);
                }

            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($cours);
            $em->flush();

            return $this->redirectToRoute('cours_show', array('id' => $cours->getId()));
        }

        return $this->render('cours/new.html.twig', array(
            'cours' => $cours,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cours entity.
     *
     * @Route("/{id}", name="cours_show")
     * @Method("GET")
     */
    public function showAction(Cours $cours)
    {
        $deleteForm = $this->createDeleteForm($cours);

        return $this->render('cours/show.html.twig', array(
            'cours' => $cours,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cours entity.
     *
     * @Route("/{id}/edit", name="cours_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cours $cours)
    {
        $deleteForm = $this->createDeleteForm($cours);
        $editForm = $this->createForm('AppBundle\Form\CoursType', $cours);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $cours->getImageFile();
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move(
                __DIR__."/../../../web/uploads/cours",
                $filename
            );
            $cours->setImage($filename);


            $images = $cours->getContenu();
            foreach ($images as $image){
                if($image->getType() == "Image"){
                    $imagef = $image->getImageFile();
                    $filename = md5(uniqid()) . '.' . $imagef->guessExtension();
                    $imagef->move(
                        __DIR__."/../../../web/uploads/cours/contenus",
                        $filename
                    );
                    $image->setImage($filename);
                }

            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_edit', array('id' => $cours->getId()));
        }

        return $this->render('cours/edit.html.twig', array(
            'cours' => $cours,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cours entity.
     *
     * @Route("/{id}", name="cours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cours $cours)
    {
        $form = $this->createDeleteForm($cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cours);
            $em->flush();
        }

        return $this->redirectToRoute('cours_index');
    }

    /**
     * Creates a form to delete a cours entity.
     *
     * @param Cours $cours The cours entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cours $cours)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cours_delete', array('id' => $cours->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
