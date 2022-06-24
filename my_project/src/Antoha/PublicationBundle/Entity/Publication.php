<?php

namespace Antoha\PublicationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Publication
 * @Vich\Uploadable
 * @ORM\Table(name="PUBLICATION")
 * @ORM\Entity(repositoryClass="Antoha\PublicationBundle\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=300)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=1000, nullable=true)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


    /**
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @var Tag $id
     * @ORM\ManyToMany(targetEntity="Antoha\PublicationBundle\Entity\Tag", inversedBy="publications")
     * @ORM\JoinTable(name="publications_tags")
     */
    protected $tags;

    /**
     * @return Tag
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @var Feedback $id
     * @ORM\OneToMany(targetEntity="Antoha\PublicationBundle\Entity\Feedback", mappedBy="publication", cascade={"persist", "remove"})
     * @ORM\OrderBy({"feedbackDate"="ASC"})
     */
    protected $feedback;

    /**
     * @return Feedback
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishing_date", type="datetime")
     */
    private $publishingDate;

    /**
     * @var User $id
     * @ORM\ManyToOne(targetEntity="Antoha\PublicationBundle\Entity\User", inversedBy="publications")
     */
    protected $author;

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="publication_image", fileNameProperty="postFileName")
     *
     * @var File
     */
    private $postFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $postFileName;

    /**
     * @return File|null
     */
    public function getPostFile()
    {
        return $this->postFile;
    }

    /**
     * @param File|UploadedFile $postFile
     * @return Publication
     */
    public function setPostFile(File $postFile = null)
    {
        $this->postFile = $postFile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPostFileName()
    {
        return $this->postFileName;
    }

    /**
     *@param string $postFileName
     *@return Publication
     */
    public function setPostFileName($postFileName)
    {
        $this->postFileName = $postFileName;
        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Publication
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
     * Set img
     *
     * @param string $img
     *
     * @return Publication
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Publication
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __construct()
    {
        $this->publishingDate = new \DateTime('now');
        $this->tags = new ArrayCollection();


    }

    /**
     * Set publishingDate
     *
     * @param \DateTime $publishingDate
     *
     * @return Publication
     */
    public function setPublishingDate($publishingDate)
    {
        $this->publishingDate = $publishingDate;
        return $this;
    }

    /**
     * Get publishingDate
     *
     * @return \DateTime
     */
    public function getPublishingDate()
    {
        return $this->publishingDate;
    }


}

