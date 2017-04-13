<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="IDX_9474526CFBF32840", columns={"response_id"}), @ORM\Index(name="IDX_9474526CA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class Comment
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
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Response", inversedBy="comments")
     */
    private $response;


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
     *
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
     * Set user
     *
     * @param \XTeam\PlatformBundle\Entity\User $user
     *
     * @return Comment
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
     * Set response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     *
     * @return Comment
     */
    public function setResponse(\XTeam\PlatformBundle\Entity\Response $response = null)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return \XTeam\PlatformBundle\Entity\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
