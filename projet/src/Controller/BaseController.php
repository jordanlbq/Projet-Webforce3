<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route(/base/mention_legales, name="MentionLégales")
     * 
     */

     public function mentionLegales(){
        return $this->render('base/mention_legales.html.twig',[
            
            ]);
     }
}
