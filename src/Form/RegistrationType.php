<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('Nom_utilisateur')
            ->add('CIN')
            ->add('Telephone')
            ->add('Date_naissance')
            ->add('Type')
            ->add('Login')
            ->add('Photo')
            ->add('CV')
            ->add('nbr_postulation')
            ->add('date_last_login')
            ->add('Etat')
            ->add('isVerified')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
