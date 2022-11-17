<?php

namespace App\Form;

use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            "label"=>"Titre", 
            "required"=>false])
        ->add('text', CKEditorType::class, [
            "label"=>"Description", 
            "required"=>false])
        ->add('imageFile', FileType::class, [
            "label" => "Image", 
            "required" => $options["imageRequired"]])
        ->add('tag', ChoiceType::class, [
            "label"=>"Tag", 
            "required"=>false,
            "choices" => [
                "home"=>"home",
                "contact"=>"contact",
                "crèche"=>"crèche",
            ]])
            ->remove('imageName')
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
            "imageRequired"=>true,
        ]);
    }
}
