<?php

namespace AG\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => 'Username'
            ))
            ->add('email', 'email', array(
                'label' => 'E-mail address'
            ))
            ->add('roles', 'choice', array(
                'label' => 'Credentials',
                'choices' => array(
                    'ROLE_ADMIN' => 'ROLE_ADMIN'
                ),
                'choices_as_values' => true,
                'multiple' => true,
                'expanded' => true
            ))
            ->add('save', 'submit', array(
                'label' => 'Save'
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AG\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ag_userbundle_user';
    }
}
