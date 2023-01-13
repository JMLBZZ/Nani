<?php

namespace App\Form;

use App\Entity\Policy;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PolicyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('title', TextType::class, [
                "label"=>"Titre",
                "help"=>"Titre du texte des politiques de confidentialité", 
                "help_attr"=>["class"=>"text-danger"], 
                "required"=>true])
            ->add('text', CKEditorType::class, [
                "label"=>"Texte", 
                "required"=>true])
            ->add('isActive', CheckboxType::class, [
                "label"=>"Activer ?", 
                "row_attr"=>["class"=>"form-switch"],
                "required"=>true])
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Policy::class,
        ]);
    }
}
