<?php

namespace App\Form;

use App\Entity\Marque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder



            ->add('libelle',TextType::class, array(
                'attr'=>array('class'=>'form-control'),
                'label' => 'Libellé voiture',
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
            'data_class' => Marque::class,
        ]);
    }
}
