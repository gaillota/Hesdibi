<?php

namespace AG\UserBundle\Entity;

use AG\VaultBundle\Entity\File;
use AG\VaultBundle\Entity\Folder;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AG\UserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var String
     *
     * @ORM\Column(name="api_key", type="string", length=255, nullable=true)
     *
     * @Exclude
     */
    private $apiKey;

    /**
     * @ORM\OneToMany(targetEntity="AG\VaultBundle\Entity\File", mappedBy="owner")
     *
     * @Exclude
     */
    private $files;

    /**
     * @ORM\OneToMany(targetEntity="AG\VaultBundle\Entity\Folder", mappedBy="owner")
     *
     * @Exclude
     */
    private $folders;

    /**
     * @ORM\ManyToMany(targetEntity="AG\VaultBundle\Entity\File", mappedBy="authorizedUsers")
     *
     * @Exclude
     */
    private $sharedFiles;

    public function __construct()
    {
        parent::__construct();
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

    /**
     * Set apiKey
     *
     * @param string $apiKey
     * @return User
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string 
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function generateApiKey()
    {
        $this->apiKey = md5(uniqid());
    }
}
