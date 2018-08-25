<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('username')
            ->add('username_canonical')
            ->add('email')
            ->add('email_canonical')
            ->add('gender')
            ->add('birthday')
            ->add('civil_status')
            ->add('location')
            ->add('language')
            ->add('image')
            ->add('created_at')
            ->add('modificated_at')
            ->add('facebook_id')
            ->add('facebook_access_token')
            ->add('google_id')
            ->add('enabled')
            ->add('google_access_token');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
