<?php

namespace App\Form\Admin;

use App\Entity\Admin\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('type')
            ->add('publishid')
            ->add('year')
            ->add('amount')
            ->add('pprice')
            ->add('sprice')
            ->add('description')
            ->add('keywords')
            ->add('detail')
            ->add('image')
            ->add('writer')
            ->add('status')
            ->add('userid')
            ->add('categoryid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'csrf_protection' => false,
        ]);
    }
}
