<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker; 
use \Date;
use App\Entity\User;
use App\Entity\Definition;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       	// on récupère un objet FAKER en Français. 
		$faker = Faker\Factory::create('fr_FR');
       
		
		// for($i = 0; $i < 20; $i++){
		// 	$user = new User; 
        //     $user -> setUsername($faker -> name);
        //     $user -> setPassword($faker -> name);
        //     $user -> setEmail($faker -> email);
        //     $user -> setPrenom($faker -> name);
        //     $user -> setNom($faker -> name);
        //     $user -> setCivilite($faker -> randomElement(['m', 'f']));
        //     $user -> setVille($faker -> city);
        //     $user -> setCodePostal($faker -> postcode);
        //     $user -> setAdresse($faker -> address);
        //     $user -> setTelephone($faker -> phoneNumber);
        //     $user -> setDateDeNaissance($faker -> dateTimeAD($max = 'now', $timezone = null) );

		// 	//----
		// 	$manager -> persist($user);
		// }
        // $manager->flush();

        // $date = new \Date('06/04/2014');
		// for($i = 0; $i < 20; $i++){
		// 	$definition = new Definition; 
        //     $definition -> setDescription($faker -> name);
        //     $definition -> setTerme($faker -> name);
        //     $definition -> setDateUpload($date);
        //     $photo = $produit -> getTitre() . '.jpg';
        //     $definition -> setFile($photo );
        //     $definition -> setVideoUrl($faker -> url);
        //     $definition -> setVideoUpload($photo);


		// 	//----
		// 	$manager -> persist($definition);
		// }
        // $manager->flush();
    }
}

