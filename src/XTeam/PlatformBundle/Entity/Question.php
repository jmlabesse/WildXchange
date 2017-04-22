<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="IDX_B6F7494EA76ED395", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="XTeam\PlatformBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=255, nullable=false)
     */
    private $question;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_resolved", type="boolean", nullable=false)
     */
    private $isResolved;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\OneToMany(targetEntity="Response", mappedBy="question")
     */
    private $responses;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="questions")
     */
    private $user;

    /**
     * Many Questions have Many Tags.
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="questions")
     * @ORM\JoinTable(name="questions_tags")
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="question")
     */
    private $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setDate(new \DateTime('now'));
    }

    public function __toString()
    {
        return $this->id . ' : ' . $this->titre;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Question
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set isResolved
     *
     * @param boolean $isResolved
     *
     * @return Question
     */
    public function setIsResolved($isResolved)
    {
        $this->isResolved = $isResolved;

        return $this;
    }

    /**
     * Get isResolved
     *
     * @return boolean
     */
    public function getIsResolved()
    {
        return $this->isResolved;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Question
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Add response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     *
     * @return Question
     */
    public function addResponse(\XTeam\PlatformBundle\Entity\Response $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     */
    public function removeResponse(\XTeam\PlatformBundle\Entity\Response $response)
    {
        $this->responses->removeElement($response);
    }

    /**
     * Get responses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Set user
     *
     * @param \XTeam\PlatformBundle\Entity\User $user
     *
     * @return Question
     */
    public function setUser(\XTeam\PlatformBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \XTeam\PlatformBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add tag
     *
     * @param \XTeam\PlatformBundle\Entity\Tag $tag
     *
     * @return Question
     */
    public function addTag(\XTeam\PlatformBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \XTeam\PlatformBundle\Entity\Tag $tag
     */
    public function removeTag(\XTeam\PlatformBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add comment
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comment
     *
     * @return Question
     */
    public function addComment(\XTeam\PlatformBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comment
     */
    public function removeComment(\XTeam\PlatformBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
