<?php

namespace App\Form;

use App\Entity\Card;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('imageName')
            ->add('isActive', CheckboxType::class, [
                "label"=>"Activer ?", 
                "row_attr"=>["class"=>"form-switch"],
                "required"=>false])
            ->add('imageFile', FileType::class, [
                "label" => "Image", 
                "required" => $options["imageRequired"]])
            ->add('title', CKEditorType::class, [
                "label"=>"Titre", 
                "required"=>false])
            ->add('text', CKEditorType::class, [
                "label"=>"Description", 
                "required"=>true])
            ->remove('updatedAt')
            ->add('tag', ChoiceType::class, [
                "label"=>"Tag", 
                "required"=>false,
                "choices" => [
                    "home"=>"home",
                    "info"=>"info",
                ]])            
            ->remove('imageName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Card::class,
            "imageRequired"=>true,
        ]);
    }
}
