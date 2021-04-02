<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Entity\SimilarAnimal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name_animal')
            ->add('diet_animal')
            ->add('status_animal')
            ->add('family_animal')
            ->add('population_animal')
            ->add('description_animal')
            ->add('nickname_animal')
            ->add('main_picture_animal', FileType::class, [
                'label' => 'Ajouter l\'image principale',
                'data_class' => null,
                'required' => false
                ])
            ->add('appearance_animal')
            ->add('legs_animal')
            ->add('social_animal')
            ->add('cut_out_image_animal', FileType::class, [
                'label' => 'Ajouter l\'image détourée',
                'data_class' => null,
                'required' => false
                ])
            ->add('desc_more_animal', TextType::class, [
                'data_class' => null,
                'required' => false
            ])
            ->add('habitats',EntityType::class, [
                'class' => Habitat::class,
                'multiple'=> true,
                'expanded' => true,
                'choice_label' => 'name_habitat',
                'choice_value' => 'id'
                ]
                )
            ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
