<?php

namespace AG\VaultBundle\Entity;

use AG\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * File
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AG\VaultBundle\Repository\FileRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\Uploadable(allowOverwrite=true, appendNumber=true, filenameGenerator="SHA1")
 */
class File
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
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="decimal")
     * @Gedmo\UploadableFileSize
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     * @Gedmo\UploadableFilePath
     */
    private $path;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime")
     * @Assert\DateTime()
     */
    private $lastModified;

    /**
     * @Assert\File(
     *      maxSize="10M",
     *      mimeTypes={"application/pdf", "application/x-pdf"},
     *      mimeTypesMessage="Ce fichier n'est pas au bon au bon format",
     *      maxSizeMessage="Fichier trop gros (10Mo max)"
     *  )
     */
    private $file;

    /**
     * @var Folder
     *
     * @ORM\ManyToOne(targetEntity="Folder", inversedBy="files")
     */
    private $folder;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AG\UserBundle\Entity\User", inversedBy="files")
     * @Gedmo\Blameable(on="create")
     */
    private $owner;

    /**
     * @var array
     *
     * @ORM\Column(name="send_to", type="array")
     */
    private $sendTo = array();


    public function __construct()
    {
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
     * @return File
     */
    public function setName($name)
    {
        if(substr($name, -4) !== '.pdf') $name .= '.pdf';
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
     * Set size
     *
     * @param integer $size
     * @return File
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return File
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get web path
     *
     * @return string
     */
    public function getWebPath()
    {
        return preg_replace('#^.+\.\./web/(.+)$#', '$1', $this->getPath());
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set folder
     *
     * @param Folder $folder
     * @return File
     */
    public function setFolder(Folder $folder = null)
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * Get folder
     *
     * @return Folder
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set owner
     *
     * @param User $owner
     * @return File
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
     * @return File
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

    /**
     * Set sendTo
     *
     * @param array $sendTo
     * @return File
     */
    public function setSendTo($sendTo)
    {
        $this->sendTo = $sendTo;

        return $this;
    }

    /**
     * Get sendTo
     *
     * @return array 
     */
    public function getSendTo()
    {
        return $this->sendTo;
    }
}
