<?php

namespace AG\VaultBundle\Entity;

use AG\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Folder
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AG\VaultBundle\Repository\FolderRepository")
 */
class Folder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"name"}, unique=false)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime")
     * @Assert\DateTime()
     */
    private $lastModified;

    /**
     * @ORM\OneToMany(targetEntity="File", mappedBy="folder")
     */
    private $files;

    /**
     * @var Folder
     *
     * @ORM\OneToMany(targetEntity="Folder", mappedBy="parent")
     */
    private $children;

    /**
     * @var Folder
     *
     * @ORM\ManyToOne(targetEntity="Folder", inversedBy="children")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    private $parent;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AG\UserBundle\Entity\User", inversedBy="folders")
     * @Gedmo\Blameable(on="create")
     */
    private $owner;


    public function __construct()
    {
        $this->files = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->parent = null;
        $this->lastModified = new \DateTime();
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
     * Set name
     *
     * @param string $name
     * @return Folder
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add files
     *
     * @param File $files
     * @return Folder
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
     * Add children
     *
     * @param Folder $children
     * @return Folder
     */
    public function addChild(Folder $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param Folder $children
     */
    public function removeChild(Folder $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param Folder $parent
     * @return Folder
     */
    public function setParent(Folder $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return Folder
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set owner
     *
     * @param User $owner
     * @return Folder
     */
    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Folder
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    public function getSize()
    {
        $size = 0;
        foreach ($this->children as $folder) {
            $size += $folder->getSize();
        }
        foreach ($this->files as $file) {
            $size += $file->getSize();
        }
        return $size;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Folder
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }
}
