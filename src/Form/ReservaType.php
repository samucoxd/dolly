<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Reserva;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('cliente', EntityType::class, ['class' => Cliente::class, 'choice_label' => 'nombre'])
            ->add('user', EntityType::class, ['class' => User::class, 'choice_label' => 'nombre'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reserva::class,
        ]);
    }
}
