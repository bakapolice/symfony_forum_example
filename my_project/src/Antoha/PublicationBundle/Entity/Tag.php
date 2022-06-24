<?php

namespace Antoha\PublicationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="TAG")
 * @ORM\Entity(repositoryClass="Antoha\PublicationBundle\Repository\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="tag_name", type="string", length=50, unique=true)
     */
    private $tagName;

    /**
     * @var Publication $id
     * @ORM\ManyToMany(targetEntity="Antoha\PublicationBundle\Entity\Publication", mappedBy="tags")
     */
    private $publications;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
    }

    /**
     * @return Publication
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * @param Publication $publications
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;
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
     * @return string
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * @param string $tagName
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;
    }


}

