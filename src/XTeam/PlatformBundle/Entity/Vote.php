<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote", indexes={@ORM\Index(name="IDX_5A108564A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_5A108564FBF32840", columns={"response_id"})})
 * @ORM\Entity
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Response
     *
     * @ORM\ManyToOne(targetEntity="Response")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="response_id", referencedColumnName="id")
     * })
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
}
