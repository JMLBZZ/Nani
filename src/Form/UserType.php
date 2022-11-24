<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civ', ChoiceType::class, [
                "label" => "Civilité",
                "choices" => [
                    "Monsieur"=>"Monsieur",
                    "Madame"=>"Madame",]
                ])
            ->add('name', TextType::class, [
                "label"=>"Nom"])
            ->add('firstname', TextType::class, [
                "label"=>"Prénom"])
            ->add('street', TextType::class, [
                "label"=>"Adresse"])
            ->add('complement', TextType::class, [
                "label"=>"Complément d'adresse",
                "required"=>false])
            ->add('cp', TextType::class, [
                "label"=>"Code postal",
                "attr"=>["maxlength"=>5],])
            ->add('city', TextType::class, [
                "label"=>"Ville"])
            ->add('tel', TextType::class, [
                "label"=>"Tél.",
                "help"=>"Le numéro de téléphone doit contenir uniquement 10 chiffres sans espaces", 
                "help_attr"=>["class"=>"text-info"],
                "attr"=>["maxlength"=>10],])
            ->add('email')
            ->remove('roles')
            ->remove('password')
            ->remove('isVerified')
            ->remove('slug')
            ->remove('secretIV')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
