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
            ->add('description', TextareaType::class)
            ->add('terme', TextType::class)
            ->add('dateUpload', BirthdayType::class)
            -> add('file', FileType::class, array(
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
						'maxSize' => '2M',
						'maxSizeMessage' => '>Veuillez sélectionner une image de 2Mo maximum'
					)),
				), 
				'label' => 'Photo'
			))
            ->add('videoUrl', TextType::class)
            ->add('videoUpload', FileType::class, array(
				'constraints' => array(
					new Assert\File(array(
                        'mimeTypes' => array(
							'video/mp4',
							"video/mpeg"
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
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Definition::class,
            'attr' => [
                'novalidate' => 'novalidate'
            ]
        ]);
    }
    
}