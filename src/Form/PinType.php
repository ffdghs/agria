<?php

namespace App\Form;

use App\Entity\Pin;
use App\Entity\Animal;
use App\Entity\Region;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('longitude_pin')
            ->add('latitude_pin')
            ->add('style_pin')
            ->add('id_region_pin',EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'name_region'
                
            ])
            ->add('id_animal_pin',EntityType::class, [
                'class' => Animal::class,
                'choice_label' => 'name_animal'
                
            ])
            ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pin::class,
        ]);
    }
}
