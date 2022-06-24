<?php

namespace Antoha\PublicationBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Antoha\PublicationBundle\Entity\User;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function previewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AntohaPublicationBundle:User')->findAll();

        return $this->render('@AntohaPublication/user/preview-users.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * @Route("/users/{usernameCanonical}")
     */
    public function showAction($usernameCanonical, Request $request)
    {
        $userRepo = $this->getDoctrine()->getRepository('AntohaPublicationBundle:User');
        /** @var User $user */
        $user = $userRepo->findOneBy(array('usernameCanonical'=>$usernameCanonical));
        if(!$user)
        {
            throw $this->createNotFoundException('User does not exist');
        }
        return $this->render('@AntohaPublication/user/show-user-profile.html.twig', ['user'=>$user])
        ;
    }
}