<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ])
                ],
                'label' => 'Adresse mail'
            ])
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ])
                ],
                'label' => 'Nom'
            ])
            ->add('surname', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ])
                ],
                'label' => 'Prénom'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le mot de passe doit faire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 64,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
