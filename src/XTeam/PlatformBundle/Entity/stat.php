<?php

namespace XTeam\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * stat
 */
class stat
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $questionCount;

    /**
     * @var int
     */
    private $responseCount;

    /**
     * @var int
     */
    private $bestresponseCount;


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
     * Set questionCount
     *
     * @param integer $questionCount
     * @return stat
     */
    public function setQuestionCount($questionCount)
    {
        $this->questionCount = $questionCount;

        return $this;
    }

    /**
     * Get questionCount
     *
     * @return integer 
     */
    public function getQuestionCount()
    {
        return $this->questionCount;
    }

    /**
     * Set responseCount
     *
     * @param integer $responseCount
     * @return stat
     */
    public function setResponseCount($responseCount)
    {
        $this->responseCount = $responseCount;

        return $this;
    }

    /**
     * Get responseCount
     *
     * @return integer 
     */
    public function getResponseCount()
    {
        return $this->responseCount;
    }

    /**
     * Set bestresponseCount
     *
     * @param integer $bestresponseCount
     * @return stat
     */
    public function setBestresponseCount($bestresponseCount)
    {
        $this->bestresponseCount = $bestresponseCount;

        return $this;
    }

    /**
     * Get bestresponseCount
     *
     * @return integer 
     */
    public function getBestresponseCount()
    {
        return $this->bestresponseCount;
    }
}
