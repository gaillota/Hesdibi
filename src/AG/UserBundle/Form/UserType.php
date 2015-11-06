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
                'label' => 'Nom d\'utilisateur'
            ))
            ->add('email', 'email', array(
                'label' => 'Adresse mail'
            ))
            ->add('enabled', 'checkbox', array(
                'label' => 'Activé',
                'required' => false,
            ))
            ->add('locked', 'checkbox', array(
                'label' => 'Verrouillé',
                'required' => false
            ))
            ->add('save', 'submit', array(
                'label' => 'Sauvegarder'
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
