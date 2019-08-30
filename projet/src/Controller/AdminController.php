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
			// $password = md5(rand(1, 99999)); //DF5ESdsrSF5S56 
			// $membre -> setPassword($password);
			
			$manager -> flush();
			
			// On envoie un email au membre, $membre -> getEmail(), en lui transmettant son mot de passe $password
			
			$this -> addFlash('success', 'Le membre ' . $user -> getId() . ' a été ajouté avec succès !');
			return $this -> redirectToRoute('admin_user');
		}
        return $this->render('admin/user_form.html.twig', [
            'userForm' => $form -> createView() 
           
        ]);
    }

    /**
     * @Route("/admin/user/update/{id}", name="admin_user_update")
     */
    public function adminUserUpdate($id, ObjectManager $manager, Request $request)
    {
        $user = $manager -> find(User::class, $id);
		$form = $this -> createForm(UserType::class, $user, array('admin' => true));
		
		// traiter les infos du formulaire 
		$form -> handleRequest($request);
		if($form -> isSubmitted() && $form -> isValid()){
			
			$manager -> persist($user);
			$manager -> flush();
			
			$this -> addFlash('success', 'Le membre ' . $id . ' a bien été modifié !');
			return $this -> redirectToRoute('admin_user');
		}
        return $this->render('admin/user_form.html.twig', [
            'userForm' => $form -> createView(),
			
        ]);
    }

    /**
     * @Route("/admin/user/delete/{id}", name="admin_user_delete")
     */
    public function adminUserDelete($id)
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
     * @Route("/admin/Definition/add", name="admin_Definition_add")
     */
    public function adminDefinitionAdd()
    {
        
        
        return $this->render('admin/Definition_form.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/Definition/update/{id}", name="admin_Definition_update")
     */
    public function adminDefinitionUpdate($id)
    {
        return $this->render('admin/Definition_form.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/Definition/delete/{id}", name="admin_Definition_delete")
     */
    public function adminDefinitionDelete($id)
    {
       
    }

    // Validation de l'admin de l'ajout de video ou d'image par le user

    /**
     * @Route("/admin/Definition/validate/{id}", name="admin_Definition_validate")
     */
    public function adminDefinitionValidate($id)
    {
       
    }
}