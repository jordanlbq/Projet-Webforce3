<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription()
    {
        return $this->render('user/register.html.twig', [
           
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

