<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    //routes pour l'admin
    // le  CRUD CREATE READ UPDATE DELETE
    // Routes pour que l'admin puisse voir la liste des users créer un user, modifier le profil son rôle et le supprimer

    /**
     * @Route("/admin/user", name="admin_user")
     */
    public function adminUser()
    {
        return $this->render('admin/user_list.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function adminUserAdd()
    {
        return $this->render('admin/user_form.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/user/update/{id}", name="admin_user_update")
     */
    public function adminUserUpdate($id)
    {
        return $this->render('admin/user_form.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/user/delete/{id}", name="admin_user_delete")
     */
    public function adminUserDelete($id)
    {
       
    }


    //routes pour l'admin
    // le CRUD CREATE READ UPDATE DELETE
    // Routes pour que l'admin puisse voir la liste des definition, créer une definition, modifier une definition et la supprimer 

    /**
     * @Route("/admin/definition", name="admin_definition")
     */
    public function adminDefinition()
    {
        return $this->render('admin/Definition_list.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/Definition/add", name="admin_Definition_add")
     */
    public function adminDefinitionAdd()
    {
        return $this->render('admin/Definition_form.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/Definition/update/{id}", name="admin_Definition_update")
     */
    public function adminDefinitionUpdate($id)
    {
        return $this->render('admin/Definition_form.html.twig', [
           
        ]);
    }

    /**
     * @Route("/admin/Definition/delete/{id}", name="admin_Definition_delete")
     */
    public function adminDefinitionDelete($id)
    {
       
    }

    // Validation de l'admin de l'ajout de video ou d'image par le user

    /**
     * @Route("/admin/Definition/validate/{id}", name="admin_Definition_validate")
     */
    public function adminDefinitionValidate($id)
    {
       
    }
}