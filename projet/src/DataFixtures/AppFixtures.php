<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker; 

use App\Entity\User;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       	// on récupère un objet FAKER en Français. 
		$faker = Faker\Factory::create('fr_FR');
       
		
		for($i = 0; $i < 20; $i++){
			$user = new User; 
            $user -> setUsername($faker -> name);
            $user -> setPassword($faker -> name);
            $user -> setEmail($faker -> email);
            $user -> setPrenom($faker -> name);
            $user -> setNom($faker -> name);
            $user -> setCivilite($faker -> randomElement(['m', 'f']));
            $user -> setVille($faker -> city);
            $user -> setCodePostal($faker -> postcode);
            $user -> setAdresse($faker -> address);
            $user -> setTelephone($faker -> phoneNumber);
            $user -> setDateDeNaissance($faker -> dateTimeAD($max = 'now', $timezone = null) );

			//----
			$manager -> persist($user);
		}
        $manager->flush();
    }
}

