<?php

namespace App\Form;

use App\Entity\Orderdetail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderdetailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderid')
            ->add('userid')
            ->add('productid')
            ->add('price')
            ->add('quantity')
            ->add('amount')
            ->add('name')
            ->add('status')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orderdetail::class,
        ]);
    }
}
