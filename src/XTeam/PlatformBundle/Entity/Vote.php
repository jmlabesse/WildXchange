<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *

 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="XTeam\PlatformBundle\Repository\VoteRepository")
 */

class Vote
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

     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

    /**

     * @ORM\ManyToOne(targetEntity="Response", inversedBy="votes")
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
     * Set user
     *
     * @param \XTeam\PlatformBundle\Entity\User $user
     *
     * @return Vote
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
     * @return Vote
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

    /**
     * Set responses
     *
     * @param \XTeam\PlatformBundle\Entity\Response $responses
     *
     * @return Vote
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
}
