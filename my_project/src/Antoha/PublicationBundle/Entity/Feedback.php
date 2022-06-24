<?php

namespace Antoha\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="FEEDBACK")
 * @ORM\Entity(repositoryClass="Antoha\PublicationBundle\Repository\FeedbackRepository")
 */
class Feedback
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Antoha\PublicationBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Publication
     * @ORM\ManyToOne(targetEntity="Antoha\PublicationBundle\Entity\Publication", inversedBy="feedback")
     * @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     */
    protected $publication;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    protected $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="feedback_date", type="datetime")
     */
    protected $feedbackDate;


    public function __construct()
    {
        $this->feedbackDate = new \DateTime('now');
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
     * Set user
     *
     * @param User $user
     *
     * @return Feedback
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set publication
     *
     * @param \stdClass $publication
     *
     * @return Feedback
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return Publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Feedback
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set feedbackDate
     *
     * @param \DateTime $feedbackDate
     *
     * @return Feedback
     */
    public function setFeedbackDate($feedbackDate)
    {
        $this->feedbackDate = $feedbackDate;

        return $this;
    }

    /**
     * Get feedbackDate
     *
     * @return \DateTime
     */
    public function getFeedbackDate()
    {
        return $this->feedbackDate;
    }
}

