<?php
/**
 * Created by PhpStorm.
 * User: Vsrat
 * Date: 12/11/2018
 * Time: 11:30 AM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{

    /**
     * @Route("/page/{pageName}")
     */
    public function showAction($pageName)
    {
        //$templating = $this->container->get('templating');
        //$html = $templating->render('page/show.html.twig', ['name' => $pageName]);
        return $this->render('page/show.html.twig', ['name' => $pageName]);
    }
}