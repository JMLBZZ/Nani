<?php

namespace App\Form;

use App\Entity\Kid;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class KidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label"=>"Nom"])
            ->add('firstname', TextType::class, [
                "label"=>"Prénom"])
            ->add('birthdate',DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', 
                "label"=>"Date de naissance de l'enfant",
                "required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kid::class,
            'fromUser'=>false,
        ]);
    }
}
