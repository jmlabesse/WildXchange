<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="XTeam\PlatformBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="Response", inversedBy="comments")
     */
    private $response;

    /**
     * @ORM\OneToMany(targetEntity="History", mappedBy="comments")
     */
    private $history;


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
     * @return Comment
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
     * @return Comment
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
     * Constructor
     */
    public function __construct()
    {
        $this->response = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     * @return Comment
     */
    public function addResponse(\XTeam\PlatformBundle\Entity\Response $response)
    {
        $this->response[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     */
    public function removeResponse(\XTeam\PlatformBundle\Entity\Response $response)
    {
        $this->response->removeElement($response);
    }

    /**
     * Get response
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     * @return Comment
     */
    public function setResponse(\XTeam\PlatformBundle\Entity\Response $response = null)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Add history
     *
     * @param \XTeam\PlatformBundle\Entity\History $history
     * @return Comment
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
}
