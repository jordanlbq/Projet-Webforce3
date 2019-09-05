<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 

use App\Entity\Definition;

use App\Form\DefinitionRepository;
class DefinitionController extends AbstractController
{

    // route de l'accueil, des definition et de la barre de recherche


    /**
     * @Route ("/", name="home")
     * 
     */
    public function index(){

        return $this->render('definition/index.html.twig',[
            'action' => '',
        ]);

    }

    /**
     * @Route ("/definition/{id}", name="definition")
     * 
     */
    public function definition($id){

      ;
		
		// Méthode 2 :
		$manager = $this -> getDoctrine() -> getManager(); 
		$definition = $manager -> find(Definition::class, $id);

        return $this->render('definition/definition.html.twig',[
            'definition' => $definition,
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
		$def = $repo -> findAllBySearch($term);  
	
        return $this->render('definition/index.html.twig',[
            'definition' => $def, 
            'action' => 'recherche',
        ]);

    }

     /**
     * @Route ("/videotheque", name="videotheque")
     * 
     */
    public function videotheque(Request $request){

        $repo = $this -> getDoctrine() -> getRepository(Definition::class);	
		$definition = $repo -> findAll();	
		
		// SELECT DISTINCT p.categorie FROM produit p  ORDER BY p.categorie ASC
		
        return $this->render('definition/list_definition.html.twig',[
            'definition' => $definition,  
        ]);

    }
    /**
     * @Route ("/bibliotheque", name="bibliotheque")
     * 
     */
    public function bibliotheque(Request $request){

        $repo = $this -> getDoctrine() -> getRepository(Definition::class);	
		$definition = $repo -> findAll();	
		
		// SELECT DISTINCT p.categorie FROM produit p  ORDER BY p.categorie ASC
		
        return $this->render('definition/list_mots.html.twig',[
            'definition' => $definition,  
        ]);

    }

}
