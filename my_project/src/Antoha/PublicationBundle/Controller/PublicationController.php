<?php

namespace Antoha\PublicationBundle\Controller;

use Antoha\PublicationBundle\Entity\Feedback;
use Antoha\PublicationBundle\Entity\Publication;
use Antoha\PublicationBundle\Entity\User;
use Antoha\PublicationBundle\Form\CommentForm;
use Antoha\PublicationBundle\Repository\PublicationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Publication controller.
 *
 */
class PublicationController extends Controller
{
    /**
     * Lists all publication entities.
     */
    public function previewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $publications = $em->getRepository('AntohaPublicationBundle:Publication')->findAll();
        return $this->render('@AntohaPublication/publication/preview.html.twig', array(
            'publications' => $publications,
        ));
    }

    /**
     * Creates a new publication entity.
     */
    public function newAction(Request $request)
    {
        $publication = new Publication();
        $author = $this->getUser();
        $publication->setAuthor($author);
        $form = $this->createForm('Antoha\PublicationBundle\Form\PublicationType', $publication);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $tags = $em->getRepository('AntohaPublicationBundle:Tag')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($publication);
            $em->flush();
            return $this->redirectToRoute('publication_show', array('id' => $publication->getId()));
        }

        return $this->render('@AntohaPublication/publication/new.html.twig', array(
            'publication' => $publication,
            'form' => $form->createView(),
            'tags' => $tags
        ));
    }

    /**
     * Finds and displays a publication entity.
     *
     */
    public function showAction(Publication $publication, Request $request)
    {
        $publicationRepo = $this->getDoctrine()->getRepository('AntohaPublicationBundle:Publication');
        /** @var Publication $publication */
        $id = $publication->getId();
        $publication = $publicationRepo->find($id);
        if(!$publication)
        {
            throw $this->createNotFoundException('Publication does not exist');
        }


        $commentForm = $this->createForm(CommentForm::class);
        $commentForm->handleRequest($request);
        if($commentForm->isSubmitted())
        {
            /** @var Feedback $feedback */
            $feedback = $commentForm->getData();
            $user = $this->getUser();
            $feedback->setPublication($publication);
            $feedback->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($feedback);
            $em->flush();
            return $this->redirectToRoute('publication_show', ['id' => $publication->getId()]);
        }
        return $this->render('@AntohaPublication/publication/show.html.twig', array(
            'publication' => $publication,
            'comment_form' => $commentForm->createView(),

        ));
    }

    /**
     * Displays a form to edit an existing publication entity.
     */
    public function editAction(Request $request, Publication $publication)
    {
        $editForm = $this->createForm('Antoha\PublicationBundle\Form\PublicationType', $publication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('publication_show', array('id' => $publication->getId()));
        }

        return $this->render('@AntohaPublication/publication/edit.html.twig', array(
            'publication' => $publication,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a publication entity.
     */
    public function deleteAction(Request $request, Publication $publication)
    {
        $this->getDoctrine()->getManager()->remove($publication);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('notice', "Публикация удалена!");
        return $this->redirectToRoute('publication_preview');
    }
}
