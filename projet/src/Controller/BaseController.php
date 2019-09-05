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

    /**
     * @Route ("/cgu", name="CGU")
     * 
     */
    public function CGU(){
        return $this->render('base/cgu.html.twig',[

        ]);
    }

    /**
     * @Route ("/apropos", name="A Propos")
     * 
     */
    public function apropos(){
        return $this->render('base/a_propos.html.twig',[

        ]);
    }

    /**
     * @Route ("/quisommesnous", name="Qui Sommes Nous")
     * 
     */
    public function quisommesnous(){
        return $this->render('base/qui_sommes_nous.html.twig',[

        ]);
    }
}
