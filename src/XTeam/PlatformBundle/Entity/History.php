<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity(repositoryClass="XTeam\PlatformBundle\Repository\HistoryRepository")
 */
class History
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
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="history")
     */
    private $questions;

    /**
     * @ORM\ManyToOne(targetEntity="Response", inversedBy="history")
     */
    private $responses;

    /**
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="history")
     */
    private $comments;


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
     * Constructor
     */
    public function __construct()
    {
        $this->history = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add history
     *
     * @param \XTeam\PlatformBundle\Entity\Question $history
     * @return History
     */
    public function addHistory(\XTeam\PlatformBundle\Entity\Question $history)
    {
        $this->history[] = $history;

        return $this;
    }

    /**
     * Remove history
     *
     * @param \XTeam\PlatformBundle\Entity\Question $history
     */
    public function removeHistory(\XTeam\PlatformBundle\Entity\Question $history)
    {
        $this->history->removeElement($history);
    }

    /**
     * Get history
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Set history
     *
     * @param \XTeam\PlatformBundle\Entity\Question $history
     * @return History
     */
    public function setHistory(\XTeam\PlatformBundle\Entity\Question $history = null)
    {
        $this->history = $history;

        return $this;
    }

    /**
     * Set questions
     *
     * @param \XTeam\PlatformBundle\Entity\Question $questions
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

    /**
     * Set responses
     *
     * @param \XTeam\PlatformBundle\Entity\Response $responses
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
     * Set comments
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comments
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
}
