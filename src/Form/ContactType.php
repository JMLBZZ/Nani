<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
                "label" => "Nom"
            ])
            ->add('email',EmailType::class, [
                "label" => "E-mail"
            ])
            ->add('phone',TextType::class, [
                "label" => "Téléphone",
                "required" => false,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez mettre le mot de passe',
                    ]),
                    new Length([
                        'min' => 9,
                        'minMessage' => 'Votre numéro de téléphone doit être écrit au format : 0122334455',
                        'maxMessage' => 'Votre numéro de téléphone doit être écrit au format : 0122334455',
                        // max length allowed by Symfony for security reasons
                        'max' => 10,
                    ]),
                    new Regex('/[0-9]{10,}/')],
            ])
            ->add('message', TextareaType::class, [
                "label" => "Message",
                'attr' => ['rows' => 6],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}