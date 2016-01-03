<?php

namespace AG\VaultBundle\Form;


use Doctrine\ORM\EntityRepository;
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
            ->remove('isEncrypted')
            ->remove('save')
            ->add('folder', 'entity', array(
                'label' => 'Dossier',
                'class' => 'AGVaultBundle:Folder',
                'property' => 'name',
                'empty_value' => 'Mon Vault',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(EntityRepository $er) {
                    return $er
                        ->createQueryBuilder('f')
                        ->orderBy('f.name', 'ASC')
                        ;
                }
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