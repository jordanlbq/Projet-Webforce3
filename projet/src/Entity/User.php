<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=30)
     * 
     * @Assert\NotBlank(message="Veuillez renseigner un pseudo")
     * @Assert\Lenght(
     * min=5,
     * max=30,
     * minMessage="Veuillez renseigner un pseudo de 5 caractères minimum",
     * maxMessage="Veuillez renseigner un pseudo de 30 caractères maximum
     * )
     */
    private $username;


    /**
     * @ORM\Column(type="string", lenght=255, nullable=false)
     * 
     * @Assert\Regex(
     * pattern="/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",
     * message="Veuillez saisir un mot de passe composé d'une majuscule, d'une minuscule, d'un chiffre(8 caractères minimum)"
     * )
     * @Assert\NotBlank(message="Veuillez renseigner un mot de passe")
     */
    private $password;


    /**
     * @ORM\Column(type="string", length=50)
     * 
     * @Assert\NotBlank(message="Veuillez renseigner un email")
     * @Assert\Email(message="Veuillez renseigner un email valide")
     */
    private $email;


    /**
     * @ORM\Column(type="string", length=30)
     * 
     * @Assert\NotBlank(message="Veuillez renseigner un prénom")
     * @Assert\Lenght(
     * min=3,
     * max=30,
     * minMessage="Veuillez renseigner un prénom de 3 caractères minimum",
     * maxMessage="Veuillez renseigner un prénom de 30 caractères maximum"
     * )
     */
    private $prenom;


    /**
     * @ORM\Column(type="string", lenght=30)
     * 
     * @Assert\NotBlank(message="Veuillez renseigner un nom")
     * @Assert\Length(
     * min=2,
     * max=30,
     * minMessage="Veuillez renseigner un nom de 2 caractères minimum,
     * maxMessage="Veuillez renseigner un nom de 30 caractères maximum"
     * )
     */
    private $nom;


    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\Choice({"m", "f"})
     * Le formulaire effectue seul cette vérification
     */
    private $civilite;


    /**
    * @ORM\Column(type="string", length=50)
    * @Assert\NotBlank(message="Veuillez renseigner une ville")
    * @Assert\Length(
    *	min=3, 
    *	max=50,
    *  minMessage="Veuillez renseigner une ville de 3 caractères mini", 
    *  maxMessage="Veuillez renseigner une ville de 50 carctères maxi"
    * )
    */
    private $ville;


    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(type="integer", message="Veuillez renseigner un code postal composé de chiffre.")
     */
    private $codePostal;


    /**
     * @ORM\Column(type="text")
     */
    private $adresse;


    /**
     * @ORM\Column(type="string", length=17)
	 * @Assert\Regex(
	 *	pattern="/^0[1-68]([-. ]?[0-9]{2}){4}$/",
	 *	message="Mauvais numero de téléphone"
	 *) 
     */
    private $telephone;


    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    private $dateDeNaissance;


    /**
     * @ORM\Column(name="role", type="string", length=20)
     */
    private $role = 'ROLE_USER';











}
