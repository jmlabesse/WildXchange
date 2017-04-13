<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 *
 * @ORM\Table(name="history", indexes={@ORM\Index(name="IDX_27BA704BBCB134CE", columns={"questions_id"}), @ORM\Index(name="IDX_27BA704B91560F9D", columns={"responses_id"}), @ORM\Index(name="IDX_27BA704B63379586", columns={"comments_id"}), @ORM\Index(name="IDX_27BA704BA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class History
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
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="action_text", type="string", length=255, nullable=true)
     */
    private $actionText;

    /**
     * @var \Comment
     *
     * @ORM\ManyToOne(targetEntity="Comment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comments_id", referencedColumnName="id")
     * })
     */
    private $comments;

    /**
     * @var \Response
     *
     * @ORM\ManyToOne(targetEntity="Response")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responses_id", referencedColumnName="id")
     * })
     */
    private $responses;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Question
     *
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questions_id", referencedColumnName="id")
     * })
     */
    private $questions;



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
     * Set icon
     *
     * @param string $icon
     *
     * @return History
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set actionText
     *
     * @param string $actionText
     *
     * @return History
     */
    public function setActionText($actionText)
    {
        $this->actionText = $actionText;

        return $this;
    }

    /**
     * Get actionText
     *
     * @return string
     */
    public function getActionText()
    {
        return $this->actionText;
    }

    /**
     * Set comments
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comments
     *
     * @return History
     */
    public function setComments(\XTeam\PlatformBundle\Entity\Comment $comments = null)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return \XTeam\PlatformBundle\Entity\Comment
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set responses
     *
     * @param \XTeam\PlatformBundle\Entity\Response $responses
     *
     * @return History
     */
    public function setResponses(\XTeam\PlatformBundle\Entity\Response $responses = null)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Get responses
     *
     * @return \XTeam\PlatformBundle\Entity\Response
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Set user
     *
     * @param \XTeam\PlatformBundle\Entity\FosUser $user
     *
     * @return History
     */
    public function setUser(\XTeam\PlatformBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \XTeam\PlatformBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set questions
     *
     * @param \XTeam\PlatformBundle\Entity\Question $questions
     *
     * @return History
     */
    public function setQuestions(\XTeam\PlatformBundle\Entity\Question $questions = null)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return \XTeam\PlatformBundle\Entity\Question
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
