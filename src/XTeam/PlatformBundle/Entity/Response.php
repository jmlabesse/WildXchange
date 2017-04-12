<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Response
 *
 * @ORM\Table(name="response")
 * @ORM\Entity(repositoryClass="XTeam\PlatformBundle\Repository\ResponseRepository")
 */
class Response
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=100)
     */
    private $content;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_correct", type="boolean")
     */
    private $isCorrect;

    /**
     * @var int
     *
     * @ORM\Column(name="vote", type="integer")
     */
    private $vote;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="responses")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity="History", mappedBy="responses")
     */
    private $history;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="response")
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
     * Set date
     *
     * @param \DateTime $date
     * @return Response
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
     * Set content
     *
     * @param string $content
     * @return Response
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set isCorrect
     *
     * @param boolean $isCorrect
     * @return Response
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return boolean 
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * Set vote
     *
     * @param integer $vote
     * @return Response
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Get vote
     *
     * @return integer 
     */
    public function getVote()
    {
        return $this->vote;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questions
     *
     * @param \XTeam\PlatformBundle\Entity\Question $questions
     * @return Response
     */
    public function addQuestion(\XTeam\PlatformBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \XTeam\PlatformBundle\Entity\Question $questions
     */
    public function removeQuestion(\XTeam\PlatformBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add responses
     *
     * @param \XTeam\PlatformBundle\Entity\Question $responses
     * @return Response
     */
    public function addResponse(\XTeam\PlatformBundle\Entity\Question $responses)
    {
        $this->responses[] = $responses;

        return $this;
    }

    /**
     * Remove responses
     *
     * @param \XTeam\PlatformBundle\Entity\Question $responses
     */
    public function removeResponse(\XTeam\PlatformBundle\Entity\Question $responses)
    {
        $this->responses->removeElement($responses);
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
     * Set responses
     *
     * @param \XTeam\PlatformBundle\Entity\Question $responses
     * @return Response
     */
    public function setResponses(\XTeam\PlatformBundle\Entity\Question $responses = null)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * Set question
     *
     * @param \XTeam\PlatformBundle\Entity\Question $question
     * @return Response
     */
    public function setQuestion(\XTeam\PlatformBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \XTeam\PlatformBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Add history
     *
     * @param \XTeam\PlatformBundle\Entity\History $history
     * @return Response
     */
    public function addHistory(\XTeam\PlatformBundle\Entity\History $history)
    {
        $this->history[] = $history;

        return $this;
    }

    /**
     * Remove history
     *
     * @param \XTeam\PlatformBundle\Entity\History $history
     */
    public function removeHistory(\XTeam\PlatformBundle\Entity\History $history)
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
     * Set comments
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comments
     * @return Response
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
     * Add comments
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comments
     * @return Response
     */
    public function addComment(\XTeam\PlatformBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comments
     */
    public function removeComment(\XTeam\PlatformBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }
}
