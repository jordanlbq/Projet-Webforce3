<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 


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
    public function recherche(Request $request){

        $repo = $this -> getDoctrine() -> getRepository(Definition::class);
		
		//1 : Récupérer les produits grâce à $term et la liste des catégories
		
		$term = $request -> query -> get('s');
		// query correspond aux parametre GET.
		$term = $repo -> findAllBySearch($term);
	
        return $this->render('definition/index.html.twig',[
            'definition' => $term,  
        ]);

    }


}
