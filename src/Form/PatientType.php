<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('age')
            ->add('genre')
            ->add('adresse')
            ->add('telephone')
            ->add('portable')
            ->add('email')
            ->add('dateNaissance', null, [
                'widget' => 'single_text',
            ])
            ->add('profession')
            ->add('antecedentMedicaux')
            ->add('numeroSecu')
            ->add('medecinTraitant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
