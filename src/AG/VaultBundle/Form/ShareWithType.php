<?php


namespace AG\VaultBundle\Form;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShareWithType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('authorizedUsers', 'entity', array(
                'class' => 'AGUserBundle:User',
                'property' => 'username',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Partager avec : '
            ))
            ->add('save', 'submit', array(
                'label' => 'Partager',
                'attr' => array(
                    'class' => 'btn-info'
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AG\VaultBundle\Entity\File'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ag_vaultbundle_share';
    }
}