<?php

namespace Antoha\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function previewAction()
    {
        return $this->render('@AntohaPublication/publication/preview.html.twig');
    }
}
