<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Voiture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder



            ->add('couleur',TextType::class, array(
                'attr'=>array('class'=>'form-control'),
                'label' => 'Couleur',
                'label_attr' => ['class' => 'form-label mt-4'],
            ))


            ->add('numeroChassi',TextType::class, array(
                'attr'=>array('class'=>'form-control'),
                'label' => 'Numero Chassi',
                'label_attr' => ['class' => 'form-label mt-4'],
            ))

            ->add('nombreSiege',TextType::class, array(
                'attr'=>array('class'=>'form-control'),
                'label' => 'Nombre de siège',
                'label_attr' => ['class' => 'form-label mt-4'],
            ))

            ->add('annee',TextType::class, array(
                'attr'=>array('class'=>'form-control'),
                'label' => 'Année',
                'label_attr' => ['class' => 'form-label mt-4'],
            ))

            ->add('kilometrage',TextType::class, array(
                'attr'=>array('class'=>'form-control'),
                'label' => 'Kilometrage',
                'label_attr' => ['class' => 'form-label mt-4'],
            ))


            ->add('marque',EntityType::class, array(
                'attr'=>array('class'=>'form-control'),

                'class' => Marque::class,
                'choice_label' => function($type){
                    return $type->getLibelle();
                },
                'label' => 'Marque',
                'label_attr' => ['class' => 'form-label mt-4'],
            ))

            ->add('submit',SubmitType::class, array(
                'attr' => ['class' => 'btn btn-primary mt-4 mb-4'],
                'label' => 'Soumettre le formulaire',
            ))  
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
