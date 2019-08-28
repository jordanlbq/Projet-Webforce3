<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefinitionController extends AbstractController
{

    // route de l'accueil, des definition et de la barre de recherche


    /**
     * @Route ("/", name="home")
     * 
     */
    public function index(){
        return $this->render('definition/index.html.twig',[
            
        ]);

    }

    /**
     * @Route ("/definition", name="definition")
     * 
     */
    public function definition(){

        return $this->render('definition/definition.html.twig',[
            
        ]);

    }

    /**
     * @Route ("/recherche", name="recherche")
     * 
     */
    public function recherche(){

        return $this->render('definition/index.html.twig',[
            
        ]);

    }


}
