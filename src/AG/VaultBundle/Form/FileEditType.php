<?php

namespace AG\VaultBundle\Form;


use AG\VaultBundle\Entity\Folder;
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
            ->remove('save')
            ->add('folder', 'entity', array(
                'label' => 'Dossier',
                'class' => 'AGVaultBundle:Folder',
                'expanded' => true,
                'data_class' => 'AG\VaultBundle\Entity\Folder',
                'choice_label' => function(Folder $folder) {
                    $listParents = array(
                        $folder->getName()
                    );
                    $nextParent = $folder->getParent();
                    while(null !== $nextParent) {
                        $listParents[] = $nextParent->getName();
                        $nextParent = $nextParent->getParent();
                    }
                    $listParents = array_reverse($listParents);
                    return implode(" > ", $listParents);
                },
                'empty_value' => 'Hesdibi',
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
                'label' => 'Enregistrer',
                'attr' => array(
                    'class' => 'pull-right btn-default'
                )
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