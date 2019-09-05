<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
   
    /**
     * @Route ("/mention", name="mentionLegales")
     * 
     */
    public function mentionLegales(){
        return $this->render('base/mention_legales.html.twig',[
            
        ]);

    }
}
