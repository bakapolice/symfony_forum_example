<?php

namespace Antoha\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * @Vich\Uploadable
 * @ORM\Entity
 * @ORM\Table(name="USER")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstName;

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @ORM\Column(type="string")
     */
    protected $middleName;
    /**
     * @var Publication
     * @ORM\OneToMany(targetEntity="Antoha\PublicationBundle\Entity\Publication", mappedBy="author")
     */
    protected $publications;

    /**
     * @var Feedback
     * @ORM\OneToMany(targetEntity="Antoha\PublicationBundle\Entity\Feedback", mappedBy="user")
     */
    protected $feedback;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="user_avatar", fileNameProperty="avatarFileName")
     *
     * @var File
     */
    private $avatarFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $avatarFileName;

    /**
     * @param File|UploadedFile $avatarFile
     *
     * @return User
     */
    public function setAvatarFile(File $avatarFile = null)
    {
        $this->avatarFile = $avatarFile;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

    /**
     * @param string $avatarFileName
     *
     * @return User
     */
    public function setAvatarFileName($avatarFileName)
    {
        $this->avatarFileName = $avatarFileName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatarFileName()
    {
        return $this->avatarFileName;
    }




    /**
     * @return Feedback
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * @return Publication
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}

