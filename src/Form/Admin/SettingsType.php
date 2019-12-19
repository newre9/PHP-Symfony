<?php

namespace App\Form\Admin;

use App\Entity\Admin\Settings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('keywords')
            ->add('company')
            ->add('address')
            ->add('fax')
            ->add('telefon')
            ->add('email')
            ->add('smtpserver')
            ->add('smtpmail')
            ->add('smtppasw')
            ->add('smtpport')
            ->add('aboutus')
            ->add('contact')
            ->add('referans')
            ->add('status')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Settings::class,
            'csrf_protection' => false,
        ]);
    }
}
