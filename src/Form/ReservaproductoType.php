<?php

namespace App\Form;

use App\Entity\Producto;
use App\Entity\Reserva;
use App\Entity\Reservaproducto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservaproductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaentrega')
            ->add('obs')
            ->add('reserva', EntityType::class, ['class' => Reserva::class, 'choice_label' => 'id'])
            ->add('producto', EntityType::class, ['class' => Producto::class, 'choice_label' => 'nombre'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservaproducto::class,
        ]);
    }
}
