<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Avatar;
use Doctrine\ORM\Mapping\EntityResult;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class EditprofileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login_user', TextType::class, [
                'label' => 'Mon pseudo',

            ])
            ->add('email_user', TextType::class, [
                'label' => 'Mon e-mail',

            ])

            ->add('name_user', TextType::class, [
                'label' => 'Mon prénom',

            ])

            ->add('id_avatar_user', EntityType::class, [
                'class' => Avatar::class,
                'expanded' => true,
                'label' => 'Mon avatar',
                'choice_label' => 'name_avatar',
                'choice_value' => 'id'
            ])

            ->add('Valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
