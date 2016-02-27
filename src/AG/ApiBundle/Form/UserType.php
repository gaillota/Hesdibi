<?php


namespace AG\ApiBundle\Form;


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
            ->add('roles', 'choice', array(
                'label' => 'Droits',
                'choices' => array(
                    'ROLE_ADMIN' => 'ROLE_ADMIN'
                ),
                'choices_as_values' => true,
                'multiple' => true,
                'expanded' => true
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AG\UserBundle\Entity\User',
            'csrf_protection'   => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ag_apibundle_user';
    }
}