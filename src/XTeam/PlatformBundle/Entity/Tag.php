<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="tagname", type="string", length=255, nullable=false)
     */
    private $tagname;

    /**
     * Many Tags have Many Questions.
     * @ORM\ManyToMany(targetEntity="Question", mappedBy="tags")
     */
    private $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tagname
     *
     * @param string $tagname
     *
     * @return Tag
     */
    public function setTagname($tagname)
    {
        $this->tagname = $tagname;

        return $this;
    }

    /**
     * Get tagname
     *
     * @return string
     */
    public function getTagname()
    {
        return $this->tagname;
    }

    /**
     * Add question
     *
     * @param \XTeam\PlatformBundle\Entity\Question $question
     *
     * @return Tag
     */
    public function addQuestion(\XTeam\PlatformBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \XTeam\PlatformBundle\Entity\Question $question
     */
    public function removeQuestion(\XTeam\PlatformBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
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
}
