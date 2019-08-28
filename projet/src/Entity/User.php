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












    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get le formulaire effectue seul cette vérification
     */ 
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set le formulaire effectue seul cette vérification
     *
     * @return  self
     */ 
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get *	min=3,
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set *	min=3,
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get *	pattern="/^0[1-68]([-. ]?[0-9]{2}){4}$/",
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set *	pattern="/^0[1-68]([-. ]?[0-9]{2}){4}$/",
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of dateDeNaissance
     */ 
    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    /**
     * Set the value of dateDeNaissance
     *
     * @return  self
     */ 
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
    /**
     * Get the value of role
     */ 
    public function getRoles()
    {
        return [ $this-> role ];
    }
}
