<?php 

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile; //$_FILES
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Definition
 * 
 * @ORM\Table(name="definition")
 * @ORM\Entity(repositoryClass="App\Repository\DefinitionRepository")
 */
class Definition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
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
     * @ORM\Column(name="terme", type="string", length=255, nullable=false)
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
    
    private $file;

    /**
     * @var string|null
     * 
     * @ORM\Column(name="videoUrl", type="string", length=255, nullable=true)
     */
    private $videoUrl; 


    /**
     * @var string|null
     * 
     * @ORM\Column(name="videoUpload", type="string", length=255, nullable=true)
     */
    private $videoUpload; 

    private $fileVideo;
    



    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of terme
     *
     * @return  string
     */ 
    public function getTerme()
    {
        return $this->terme;
    }

    /**
     * Set the value of terme
     *
     * @param  string  $terme
     *
     * @return  self
     */ 
    public function setTerme(string $terme)
    {
        $this->terme = $terme;

        return $this;
    }

    /**
     * Get the value of dateUpload
     *
     * @return  date
     */ 
    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    /**
     * Set the value of dateUpload
     *
     * @param  date  $dateUpload
     *
     * @return  self
     */ 
    public function setDateUpload(\Datetime $dateUpload)
    {
        $this->dateUpload = $dateUpload;

        return $this;
    }

    /**
     * Get the value of photo
     *
     * @return  string|null
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @param  string|null  $photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of videoUrl
     *
     * @return  string|null
     */ 
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * Set the value of videoUrl
     *
     * @param  string|null  $videoUrl
     *
     * @return  self
     */ 
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * Get the value of videoUpload
     *
     * @return  string|null
     */ 
    public function getVideoUpload()
    {
        return $this->videoUpload;
    }

    /**
     * Set the value of videoUpload
     *
     * @param  string|null  $videoUpload
     *
     * @return  self
     */ 
    public function setVideoUpload($videoUpload)
    {
        $this->videoUpload = $videoUpload;

        return $this;
    }

    public function setFile(UploadedFile $file) : self{
        $this -> file = $file;
        return $this;
    }
    
    public function getFile(){
        return $this -> file;
    }
    public function setFileVideo(UploadedFile $fileVideo) : self{
        $this -> fileVideo = $fileVideo;
        return $this;
    }
    
    public function getFileVideo(){
        return $this -> fileVideo;
    }

    // Photo
    public function UploadFile(){
        $nom = $this -> file -> getClientOriginalName();
        $new_nom = $this -> renamePhoto($nom);
        $this -> photo = $new_nom;
        $this ->file -> move($this -> dirPhoto(), $new_nom);
    }

    public function renamePhoto($name){
        return 'photo_' . time() . '_' . rand(1, 99999) . '_' . $name;
    }

    public function dirPhoto(){
        return __DIR__ . '/../../public/image';
    }

    public function removePhoto(){
        $file = $this -> dirPhoto() . $this -> getPhoto();
        if(file_exists($file) && $this -> getPhoto() != 'default.jpg'){
            unlink($file);
        }
    }

    // VideoUpload
    public function UploadedVideoUpload(){
        $nom = $this -> fileVideo -> getClientOriginalName();
        $new_nom = $this -> renameVideoUpload($nom);
        $this -> videoUpload = $new_nom;
        $this ->file -> move($this -> dirVideoUpload(), $new_nom);
    }

    public function renameVideoUpload(){
        return 'video_' . time() . '_' . rand(1, 99999) . '_' . $name;
    }

    public function dirVideoUpload(){
        return __DIR__ . '/../../public/video';
    }

    public function removeVideoUpload(){
        $fileVideo = $this -> dirVideoUpload() . $this -> getVideoUpload();
        if(file_exists($fileVideo) && $this -> getVideoUpload() != 'default.mp4'){
            unlink($fileVideo);
        }
    }

    // Description


} 
