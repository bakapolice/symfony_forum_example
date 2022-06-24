<?php

namespace Antoha\PublicationBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlockController extends Controller
{
    public function logoAction(){
        return $this->render('@AntohaPublication/Block/logo.html.twig');
    }

    public function mainMenuAction(){
        return $this->render('@AntohaPublication/Block/main-menu.html.twig');
    }

    public function mainMenuAuthorizationAction(){
        return $this->render('@AntohaPublication/Block/main-menu_authorization.html.twig');
    }

    public function mainMenuFooterAccountsAction(){
        return $this->render('@AntohaPublication/Block/footer-grid-menu_accounts.html.twig' );
    }

    public function mainMenuFooterSectionsAction(){
        return $this->render('@AntohaPublication/Block/footer-grid-menu_sections.html.twig' );
    }

    public function mainMenuFooterInformationAction(){
        return $this->render('@AntohaPublication/Block/footer-grid-menu_information.html.twig' );
    }

    public function mainMenuFooterServicesAction(){
        return $this->render('@AntohaPublication/Block/footer-grid-menu_services.html.twig' );
    }
}