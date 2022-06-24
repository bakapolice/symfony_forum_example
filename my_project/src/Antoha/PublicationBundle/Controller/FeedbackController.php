<?php

namespace Antoha\PublicationBundle\Controller;


use Antoha\PublicationBundle\Entity\Feedback;
use Antoha\PublicationBundle\Form\CommentForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FeedbackController extends Controller
{
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AntohaPublicationBundle:Feedback');
        $feedback = $repo->find($id);
        if(!$feedback){
            return $this->redirectToRoute('publication_preview');
        }

        $feedbackForm = $this->createForm('Antoha\PublicationBundle\Form\CommentForm', $feedback);
        $feedbackForm->handleRequest($request);

        if ($feedbackForm->isSubmitted())
        {
            $em->persist($feedback);
            $em->flush();

            $publication = $feedback->getPublication();

            return $this->redirectToRoute('publication_show', ['id' => $publication->getId()]);
        }

        return $this->render('@AntohaPublication/feedback/edit.html.twig', array(
            'feedback_edit_form' => $feedbackForm->createView(),
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AntohaPublicationBundle:Feedback');
        $feedback = $repo->find($id);
        if(!$feedback){
            return $this->redirectToRoute('publication_preview');
        }

        $this->getDoctrine()->getManager()->remove($feedback);
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('notice', "Комментарий удален!");

        $commentForm = $this->createForm(CommentForm::class);
        $commentForm->handleRequest($request);
        $publication = $feedback->getPublication();

        return $this->render('@AntohaPublication/publication/show.html.twig', array(
            'publication' => $publication,
            'comment_form' => $commentForm->createView()
        ));

    }
}