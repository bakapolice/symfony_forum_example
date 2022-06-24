<?php

namespace Antoha\PublicationBundle\Controller;

use Antoha\PublicationBundle\Entity\Tag;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function previewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('AntohaPublicationBundle:Tag')->findAll();

        return $this->render('@AntohaPublication/tag/preview-tags.html.twig', array(
            'tags' => $tags,
        ));
    }

    /**
     * @Route("/tags/{tagName}")
     */
    public function showAction($tagName, Request $request)
    {
        $tagRepo = $this->getDoctrine()->getRepository('AntohaPublicationBundle:Tag');
        /** @var Tag $tag */
        $tag = $tagRepo->findOneBy(array('tagName'=>$tagName));
        if(!$tag)
        {
            throw $this->createNotFoundException('Tag does not exist');
        }
        return $this->render('@AntohaPublication/tag/show-tag-publications.html.twig', ['tag'=>$tag]);
    }
}