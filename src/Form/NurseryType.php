<?php

namespace App\Form;

use App\Entity\Nursery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class NurseryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, [
                "label"=>"Activer ?", 
                "row_attr"=>["class"=>"form-switch"],
                "required"=>false])
            ->add('name', TextType::class, [
                "label"=>"Nom"])
            ->add('siret', TextType::class, [
                "label"=>"Siret",
                "attr"=>["maxlength"=>14],//bloque le clavier à 14 caractères
                "required"=>false,
                "help"=>"Le numéro Siret doit contenir uniquement 14 chiffres sans espaces", 
                "help_attr"=>["class"=>"text-info"],])
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
            ->add('capacity', IntegerType::class, [
                "label"=>"Capacité d'accueil total"])
            ->add('capacityresa', IntegerType::class, [
                "label"=>"Capacité de réservation"])
            ->add('imageFile', FileType::class, [
                "label" => "Image", 
                "required" => $options["imageRequired"], 
                "mapped"=>true])
            ->remove('imageName')
            ->remove('slug')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nursery::class,
            "imageRequired"=>true,
        ]);
    }
}
