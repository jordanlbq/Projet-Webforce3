<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\User; 
use App\Form\UserType;
use App\Repository\UserRepository;

use App\Entity\Definition; 
use App\Form\DefinitionType;  

class AdminController extends AbstractController
{

    //routes pour l'admin
    // le  CRUD CREATE READ UPDATE DELETE
    // Routes pour que l'admin puisse voir la liste des users créer un user, modifier le profil son rôle et le supprimer

    /**
     * @Route("/admin/user", name="admin_user")
     * 
     * on affiche la liste des user du site
     */
    public function adminUser()
    {
        $repo = $this -> getDoctrine() -> getRepository(User::class);
        $users = $repo -> findAll();

        return $this->render('admin/user_list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function adminUserAdd(Request $request, ObjectManager $manager)
    {
        $user = new User;
		$form = $this -> createForm(UserType::class, $user, array(
			'admin' => true
		));
		
		// traiter les données du formulaire 
		$form -> handleRequest($request);
		if($form -> isSubmitted() && $form -> isValid()){
			
			$manager -> persist($user);
			$password = md5(rand(1, 99999)); //DF5ESdsrSF5S56 
			$user -> setPassword($password);
			
			$manager -> flush();
			
			// On envoie un email au membre, $membre -> getEmail(), en lui transmettant son mot de passe $password
			
			$this -> addFlash('success', 'Le membre ' . $user -> getId() . ' a été ajouté avec succès !');
			return $this -> redirectToRoute('admin_user');
		}
        return $this->render('admin/user_form.html.twig', [
            'userForm' => $form -> createView() ,
            'action' => 'inscription d\'un membre par un admin'
        ]);
    }

    /**
     * @Route("/admin/user/update/{id}", name="admin_user_update")
     */
    public function adminUserUpdate($id, Request $request, ObjectManager $manager)
    {
        $user = $manager -> find(User::class, $id);
        $form = $this -> createForm(UserType::class, $user, array('admin' => true));
        
        $password = $user -> getPassword(); 
		// traiter les infos du formulaire 
		$form -> handleRequest($request);
		if($form -> isSubmitted() && $form -> isValid()){
            $user -> setPassword($password); 
			
            $manager -> persist($user);
            
			$manager -> flush();
			
			$this -> addFlash('success', 'Le membre ' . $id . ' a bien été modifié !');
			return $this -> redirectToRoute('admin_user');
		}
        return $this->render('admin/user_form.html.twig', [
            'userForm' => $form -> createView(),
			'action' => 'Modifier un membre'
        ]);
    }

    /**
     * @Route("/admin/user/delete/{id}", name="admin_user_delete")
     */
    public function adminUserDelete($id, ObjectManager $manager)
    {
       
		$user = $manager -> find(User::class, $id);
		
		if($user){
			$manager -> remove($user);
			$manager -> flush();
			
			$this -> addFlash('success', 'Le membre ' . $id . ' a bien été supprimé !');
			return $this -> redirectToRoute('admin_user');
		}
		else{
			//throw $this -> createNotFoundException('Le membre n\'existe pas');
			$this -> addFlash('errors', 'Le membre ' . $id . ' n\'a pas été trouvé');
			return $this -> redirectToRoute('admin_user');
		}
    }


    //routes pour l'admin
    // le CRUD CREATE READ UPDATE DELETE
    // Routes pour que l'admin puisse voir la liste des definition, créer une definition, modifier une definition et la supprimer 

    /**
     * @Route("/admin/definition", name="admin_definition")
     */
    public function adminDefinition()
    {
        $repo = $this -> getDoctrine() -> getRepository(Definition::class);
        $def = $repo -> findAll();

        return $this->render('admin/Definition_list.html.twig', [
           'def'=> $def
        ]);
    }

    /**
     * @Route("/admin/Definition/add", name="admin_definition_add")
     */
    public function adminDefinitionAdd(Request $request, ObjectManager $manager)
    {
        $definition = new Definition; //objet vide
	   
        // On récupère le formulaire
        $form = $this -> createForm(DefinitionType::class, $definition); 
        // On récupère les infos saisies dans le formulaire ($_POST)
        $form -> handleRequest($request);
        
        if($form -> isSubmitted() && $form -> isValid()){
 
             $manager = $this -> getDoctrine() -> getManager();
             $manager -> persist($definition);
             // Enregistrer le $produit dans le système 
 
             // On enregistre la photo en BDD et sur le serveur. 
             if($definition -> getFile() != NULL){
                 $definition -> uploadFile();
             }
             if($definition -> getFileVideo() != NULL){
                $definition -> UploadedVideoUpload();
            }
             
             $definition -> setDateUpload( new \Datetime('now'));
             $manager -> flush();
             // va enregistrer $produit en BDD
        
             $this -> addFlash('success', 'La definition n°' . $definition -> getId() . ' a bien été enregistré en BDD');
        

             return $this -> redirectToRoute('admin_definition');
        }
        
        return $this->render('admin/Definition_form.html.twig', [
            'definitionForm' => $form -> createView() 
        ]);
    }



    /**
     * @Route("/admin/Definition/update/{id}", name="admin_definition_update")
     */
        public function adminDefinitionUpdate($id, ObjectManager $manager, Request $request)
    {
        $definition = $manager -> find(Definition::class, $id);
		$form = $this -> createForm(DefinitionType::class, $definition, array('admin' => true));
		
		// traiter les infos du formulaire 
        $form -> handleRequest($request);
        
		if($form -> isSubmitted() && $form -> isValid()){
			
			$manager -> persist($definition);
			$manager -> flush();
			
			$this -> addFlash('success', 'La défnition ' . $id . ' a bien été modifié !');
			return $this -> redirectToRoute('admin_definition');
		}
        return $this->render('admin/definition_form.html.twig', [
            'definitionForm' => $form -> createView(),
			'action' => 'Modifier une définition'
        ]);
    }

    /**
     * @Route("/admin/Definition/delete/{id}", name="admin_definition_delete")
     */
        public function adminDefinitionDelete($id)
        {
            $manager = $this -> getDoctrine() -> getManager();
            $definition = $manager -> find(Produit::class, $id);
            
            $produit -> removePhoto();
            $manager -> remove($difinition);
            $manager -> flush();
            
            $this -> addFlash('success', 'La definition ' . $id . ' a bien été supprimé !');
            return $this -> redirectToRoute('admin_definition'); 
    
        }
    // Validation de l'admin de l'ajout de video ou d'image par le user

    /**
     * @Route("/admin/Definition/validate/{id}", name="admin_Definition_validate")
     */
    public function adminDefinitionValidate($id)
    {
       
    }
}