<?php

namespace App\Form;

use App\Entity\Definition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            ->add('description')
            ->add('terme')
            ->add('dateUpload')
            ->add('photo')
            ->add('videoUrl')
            ->add('videoUpload')
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Definition::class,
        ]);
    }
    
}