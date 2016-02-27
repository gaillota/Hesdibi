<?php


namespace AG\ApiBundle\Form;


use Symfony\Component\Form\AbstractType;
use AG\VaultBundle\Form\EmailType as BaseEmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('send')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false
        ));
    }

    public function getName()
    {
        return 'ag_apibundle_email';
    }

    public function getParent()
    {
        return new BaseEmailType();
    }
}