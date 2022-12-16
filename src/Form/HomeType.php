<?php

namespace App\Form;

use App\Entity\Home;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, [
                "label"=>"Activer ?", 
                "row_attr"=>["class"=>"form-switch"],
                "required"=>false])
            ->add('title', TextType::class, [
                "label"=>"Titre",
                "help"=>"titre du texte d'accueil", 
                "help_attr"=>["class"=>"text-danger"], 
                "required"=>true])
            ->add('text', CKEditorType::class, [
                "label"=>"Texte", 
                "required"=>true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
