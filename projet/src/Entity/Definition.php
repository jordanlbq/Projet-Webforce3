<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile; //$_FILES

/**
 * Definition
 * 
 * @ORM\Table(name="definition")
 * @ORM\Entity(repositoryClass="App\Repository\DefinitionRepository")
 */
class Definition
{
    /**
     * @var int
     * 
     * @ORM\Column(name="id", type"integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $terme;


    /**
     * @ORM\Column(type="date")
	 * @Assert\Date()
     */
    private $dateUpload;


    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo = 'default.jpg';


    /**
     * @var string|null
     * 
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $videoUrl; 


    /**
     * @var string|null
     * 
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $videoUpload; 

    


}
