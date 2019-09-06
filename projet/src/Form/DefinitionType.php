<?php

namespace App\Form;

use App\Entity\Definition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\BirthdayType; 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType; 
use Symfony\Component\Form\Extension\Core\Type\IntegerType; 
use Symfony\Component\Form\Extension\Core\Type\FileType; 
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
use Symfony\Component\Validator\Constraints as Assert;


class DefinitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            ->add('description', TextareaType::class)
            ->add('terme', TextType::class)
            -> add('file', FileType::class, array(
                'required' => false, 
				'constraints' => array(
					new Assert\Image(array(
						'mimeTypes' => array(
							'image/png',
							'image/jpeg',
							'image/jpg',
							'image/gif'
						),
						'mimeTypesMessage' => 'Veuillez sélectionner une image PNG, JPG, JPEG ou GIF' ,
					)),
					new Assert\File(array(
						'maxSize' => '5M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 5Mo maximum'
					)),
				), 
				'label' => 'Photo'
			))
            ->add('videoUrl', TextType::class, array(
                'required' => false, 
            ))
            ->add('fileVideo', FileType::class, array(
                'required' => false, 
				'constraints' => array(
					new Assert\File(array(
                        'mimeTypes' => array(
							'video/mp4',
                            "video/mpeg",
                            "video/webm"
						),
						'maxSize' => '100M',
                        'maxSizeMessage' => '>Veuillez sélectionner une image de 100Mo maximum',
                        'mimeTypesMessage' => "ce format de video est inconnu",
                        'uploadIniSizeErrorMessage' => "uploaded file is larger than the upload_max_filesize PHP.ini setting",
                        'uploadFormSizeErrorMessage' => "uploaded file is larger than allowed by the HTML file input field",
                        'uploadErrorMessage' => "uploaded file could not be uploaded for some unknown reason",
                        'maxSizeMessage' => "fichier trop volumineux"
					)),
				), 
				'label' => 'VIDEO'
            ))
            -> add('etat', ChoiceType::class, array(
                'choices' => array(
					'En attente' => '0',
					'Validé' => '1',
				)
            ))

            -> add('submit', SubmitType::class)
            
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Definition::class,
            'attr' => array(
                'novalidate' => 'novalidate'
            ),
            'admin' => false,
			'update' => false
        ]);
    }
    
}