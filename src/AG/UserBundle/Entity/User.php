<?php

namespace AG\UserBundle\Entity;

use AG\VaultBundle\Entity\File;
use AG\VaultBundle\Entity\Folder;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AG\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AG\VaultBundle\Entity\File", mappedBy="owner")
     */
    private $files;

    /**
     * @ORM\OneToMany(targetEntity="AG\VaultBundle\Entity\Folder", mappedBy="owner")
     */
    private $folders;

    /**
     * @ORM\ManyToMany(targetEntity="AG\VaultBundle\Entity\File", mappedBy="authorizedUsers")
     */
    private $sharedFiles;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->files = new ArrayCollection();
        $this->folders = new ArrayCollection();
        $this->sharedFiles = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add files
     *
     * @param File $files
     * @return User
     */
    public function addFile(File $files)
    {
        $this->files[] = $files;

        return $this;
    }

    /**
     * Remove files
     *
     * @param File $files
     */
    public function removeFile(File $files)
    {
        $this->files->removeElement($files);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Add folders
     *
     * @param Folder $folders
     * @return User
     */
    public function addFolder(Folder $folders)
    {
        $this->folders[] = $folders;

        return $this;
    }

    /**
     * Remove folders
     *
     * @param Folder $folders
     */
    public function removeFolder(Folder $folders)
    {
        $this->folders->removeElement($folders);
    }

    /**
     * Get folders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFolders()
    {
        return $this->folders;
    }

    /**
     * Add sharedFiles
     *
     * @param \AG\VaultBundle\Entity\File $sharedFile
     * @return User
     */
    public function addSharedFile(\AG\VaultBundle\Entity\File $sharedFile)
    {
        $this->sharedFiles[] = $sharedFile;

        return $this;
    }

    /**
     * Remove sharedFiles
     *
     * @param \AG\VaultBundle\Entity\File $sharedFile
     */
    public function removeSharedFile(\AG\VaultBundle\Entity\File $sharedFile)
    {
        $this->sharedFiles->removeElement($sharedFile);
    }

    /**
     * Get sharedFiles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSharedFiles()
    {
        return $this->sharedFiles;
    }
}
