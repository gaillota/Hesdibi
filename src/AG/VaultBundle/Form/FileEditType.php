<?php

namespace AG\VaultBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FileEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('name')
            ->remove('file')
            ->remove('save')
            ->add('folder', 'entity', array(
                'class' => 'AGVaultBundle:Folder',
                'property' => 'name',
                'empty_value' => 'Mon Vault',
                'empty_data' => null,
                'required' => false,
                'label' => 'Dossier',
            ))
            ->add('save', 'submit', array(
                'label' => 'Enregistrer'
            ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ag_vault_bundle_file_edit';
    }

    /**
     * @return FileType|null|string|\Symfony\Component\Form\FormTypeInterface
     */
    public function getParent()
    {
        return new FileType();
    }
} 