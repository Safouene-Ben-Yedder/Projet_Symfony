<?php

namespace App\Form;

use App\Entity\Candidature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Candidature1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('RendezVousDateTime', DateTimeType::class, [
                'required' => true,
                'label'    => 'Date et Heure du Rendez-Vous',
            
            ])
            ->add('RendezVousComment', TextType::class, [
                'required' => true,
                'label'    => 'Objet'
            ])
            ->add('RendezVousEnligne', CheckboxType::class, [
                'required' => true,
                'label'    => 'Rendez-Vous en ligne ?'
            ])
            ->add('RendezVousPlaceLink', TextType::class, [
                'required' => true,
                'label'    => 'Place ou lien du Rendez-Vous'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidature::class,
        ]);
    }
}
