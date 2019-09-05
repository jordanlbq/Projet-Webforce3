<?php 

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\PasswordType; 
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
use Symfony\Component\Form\Extension\Core\Type\BirthdayType; 
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType; 
use Symfony\Component\Form\Extension\Core\Type\IntegerType; 
use Symfony\Component\Form\Extension\Core\Type\EmailType; 

use Symfony\Component\Validator\Constraints as Assert;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('civilite', ChoiceType::class, array(
				'choices' => array(
					'Homme' => 'm',
					'Femme' => 'f',
				)
			))
            ->add('ville', TextType::class)
            ->add('codePostal', IntegerType::class)
            ->add('adresse', TextareaType::class)
            ->add('telephone', TextType::class)
            ->add('dateDeNaissance', BirthdayType::class)
            -> add('submit', SubmitType::class)
           
        ;
        if($options['admin'] == true){	
			$builder -> add('role', ChoiceType::class, array(
				'choices' => array(
					'Client' => 'ROLE_USER',
					'Admin' => 'ROLE_ADMIN',
					'Super Admin' => 'ROLE_SUPER_ADMIN'
				)
			));
		}
		else{
			if($options['update'] != true){
				$builder -> add('password', PasswordType::class, array(
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'message' => 'Veuillez renseigner un mot de passe'
                        )),
                        new Assert\Regex(array(
                            'pattern' => "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",
                            'message' => 'Veuillez saisir un mot de passe composé d\'une majuscule, d\'une minuscule, d\'un chiffre(8 caractères minimum)'
                        ))
                    ),
                ));
			}
		}
    
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => array(
				'novalidate' => 'novalidate'
            ),
            'admin' => false,
			'update' => false
        ]);
    }

 }
