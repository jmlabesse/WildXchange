<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity
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
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=255, nullable=false)
     */
    private $intitule;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_resolved", type="boolean", nullable=false)
     */
    private $isResolved;
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="tags")
     * @ORM\JoinTable(name="question_has_tag")
     */
    private $questions;

    /**
    * @ORM\OneToMany(targetEntity="History", mappedBy="questions")
    */
    private $history;

    /**
     * @ORM\OneToMany(targetEntity="Response", mappedBy="question")
     */
    private $responses;



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
     * Set intitule
     *
     * @param string $intitule
     * @return Question
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set isResolved
     *
     * @param boolean $isResolved
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
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questions
     *
     * @param \XTeam\PlatformBundle\Entity\Badge $questions
     * @return Question
     */
    public function addQuestion(\XTeam\PlatformBundle\Entity\Badge $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \XTeam\PlatformBundle\Entity\Badge $questions
     */
    public function removeQuestion(\XTeam\PlatformBundle\Entity\Badge $questions)
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
     * Set questions
     *
     * @param \XTeam\PlatformBundle\Entity\History $questions
     * @return Question
     */
    public function setQuestions(\XTeam\PlatformBundle\Entity\History $questions = null)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Add history
     *
     * @param \XTeam\PlatformBundle\Entity\History $history
     * @return Question
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
     * Set responses
     *
     * @param \XTeam\PlatformBundle\Entity\Response $responses
     * @return Question
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
     * Add responses
     *
     * @param \XTeam\PlatformBundle\Entity\Response $responses
     * @return Question
     */
    public function addResponse(\XTeam\PlatformBundle\Entity\Response $responses)
    {
        $this->responses[] = $responses;

        return $this;
    }

    /**
     * Remove responses
     *
     * @param \XTeam\PlatformBundle\Entity\Response $responses
     */
    public function removeResponse(\XTeam\PlatformBundle\Entity\Response $responses)
    {
        $this->responses->removeElement($responses);
    }
}
