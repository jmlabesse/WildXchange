<?php

namespace XTeam\PlatformBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * fos_user
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}