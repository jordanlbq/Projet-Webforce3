<?php

namespace App\Controller; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 

use App\Form\UserType;
use App\Entity\User;  

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class UserController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, ObjectManager $manager, userPasswordEncoderInterface $encoder)
    {
        $user = new User;
        $form = $this -> createForm(UserType::class, $user);
        
        $form -> handleRequest($request);
		if($form -> isSubmitted() && $form -> isValid()){
			$manager -> persist($user);
			
		
			
			$user -> setRole('ROLE_USER'); // Déjà défini dans Membre.php 
			
			// Mdp saisi dans le formulaire :
			$password = $user -> getPassword(); 
			
			// on encode selon l'algo choisi dans security.yaml pour cette entité Membre
			$password_crypte = $encoder -> encodePassword($user, $password);
			$user -> setPassword($password_crypte);
			
			$manager -> flush();
			
			$this -> addFlash('success', 'Félicitations, votre inscription a bien été prise en compte !');
			return $this -> redirectToRoute('connexion');
		}


        return $this->render('user/register.html.twig', [
            'userForm' => $form -> createView() 
        ]);
    }

   

    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('user/profil.html.twig', [
           
        ]);
    }

     /**
     * @Route("/profil/update", name="profil_update")
     */
    public function profilUpdate(Request $request, ObjectManager $manager)
    {
        $user = $this -> getUser();
		$form = $this -> createForm(UserType::class, $user, ['update' => true]);
		
		$form -> handleRequest($request);
		
		if($form -> isSubmitted() && $form -> isValid()){
			
			$manager -> persist($user);
			$manager -> flush();
			
			$this -> addFlash('success', 'Félicitations, votre profil est à jour !');
			return $this -> redirectToRoute('profil');
		}
        return $this->render('user/register.html.twig', [
            'userForm' => $form -> createView() 
        ]);
    }
    
	

   
}

