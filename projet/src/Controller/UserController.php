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
			
			
			
			//if($membre -> getDateDeNaissance() -> getTimeStamp() > time() - (16 * 365.25 * 24 * 60 * 60)){
			
			$user -> setRole('ROLE_USER'); // Déjà défini dans Membre.php 
			
			// Mdp saisi dans le formulaire :
			// $password = $user -> getPassword(); 
			
			// // on encode selon l'algo choisi dans security.yaml pour cette entité Membre
			// $password_crypte = $encoder -> encodePassword($user, $password);
			// $user -> setPassword($password_crypte);
			
			$manager -> flush();
			
			$this -> addFlash('success', 'Félicitations, votre inscription a bien été prise en compte !');
			return $this -> redirectToRoute('connexion');
		}


        return $this->render('user/register.html.twig', [
            'userForm' => $form -> createView() 
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion()
    {
        return $this->render('user/connexion.html.twig', [
           
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
	* @Route("/deconnexion", name="deconnexion")
	*
	*/
	public function deconnexion(){

    }
	
    /**
    * @Route("/connexion_check", name="connexion_check")
    *
    */
    public function connexionCheck(){

    }

   
}

