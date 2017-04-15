<?php
// src/AppBundle/Entity/User.php

namespace XTeam\PlatformBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $registration_date;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    protected $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="business", type="string", length=255, nullable=true)
     */
    protected $business;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    protected $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="promo", type="string", length=255, nullable=true)
     */
    protected $promo;

    /**
     * @var string
     *
     * @ORM\Column(name="git", type="string", length=255, nullable=true)
     */
    protected $git;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    protected $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    protected $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    protected $linkedin;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    protected $avatar;

    /**
     * @ORM\OneToMany(targetEntity="Stat", mappedBy="user")
     */
    protected $stats;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="user")
     */
    protected $questions;

    /**
     * @ORM\OneToMany(targetEntity="Response", mappedBy="user")
     */
    protected $responses;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    protected $comments;

    /**
     * Many Users have Many Badges.
     * @ORM\ManyToMany(targetEntity="Badge", inversedBy="users")
     * @ORM\JoinTable(name="users_badges")
     */
    protected $badges;

    /**
     * Many Users have Many Technos.
     * @ORM\ManyToMany(targetEntity="Techno", inversedBy="users")
     * @ORM\JoinTable(name="users_technos")
     */
    protected $technos;

    public function __construct()
    {
        parent::__construct();
        $this->setRegistrationDate(new \DateTime('now'));
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     *
     * @return User
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registration_date = $registrationDate;

        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registration_date;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return User
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set business
     *
     * @param string $business
     *
     * @return User
     */
    public function setBusiness($business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * Get business
     *
     * @return string
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set promo
     *
     * @param string $promo
     *
     * @return User
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return string
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set git
     *
     * @param string $git
     *
     * @return User
     */
    public function setGit($git)
    {
        $this->git = $git;

        return $this;
    }

    /**
     * Get git
     *
     * @return string
     */
    public function getGit()
    {
        return $this->git;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     *
     * @return User
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add stat
     *
     * @param \XTeam\PlatformBundle\Entity\Stat $stat
     *
     * @return User
     */
    public function addStat(\XTeam\PlatformBundle\Entity\Stat $stat)
    {
        $this->stats[] = $stat;

        return $this;
    }

    /**
     * Remove stat
     *
     * @param \XTeam\PlatformBundle\Entity\Stat $stat
     */
    public function removeStat(\XTeam\PlatformBundle\Entity\Stat $stat)
    {
        $this->stats->removeElement($stat);
    }

    /**
     * Get stats
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Add question
     *
     * @param \XTeam\PlatformBundle\Entity\Question $question
     *
     * @return User
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

    /**
     * Add response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     *
     * @return User
     */
    public function addResponse(\XTeam\PlatformBundle\Entity\Response $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \XTeam\PlatformBundle\Entity\Response $response
     */
    public function removeResponse(\XTeam\PlatformBundle\Entity\Response $response)
    {
        $this->responses->removeElement($response);
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
     * Add comment
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\XTeam\PlatformBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \XTeam\PlatformBundle\Entity\Comment $comment
     */
    public function removeComment(\XTeam\PlatformBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add badge
     *
     * @param \XTeam\PlatformBundle\Entity\Badge $badge
     *
     * @return User
     */
    public function addBadge(\XTeam\PlatformBundle\Entity\Badge $badge)
    {
        $this->badges[] = $badge;

        return $this;
    }

    /**
     * Remove badge
     *
     * @param \XTeam\PlatformBundle\Entity\Badge $badge
     */
    public function removeBadge(\XTeam\PlatformBundle\Entity\Badge $badge)
    {
        $this->badges->removeElement($badge);
    }

    /**
     * Get badges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * Add techno
     *
     * @param \XTeam\PlatformBundle\Entity\Techno $techno
     *
     * @return User
     */
    public function addTechno(\XTeam\PlatformBundle\Entity\Techno $techno)
    {
        $this->technos[] = $techno;

        return $this;
    }

    /**
     * Remove techno
     *
     * @param \XTeam\PlatformBundle\Entity\Techno $techno
     */
    public function removeTechno(\XTeam\PlatformBundle\Entity\Techno $techno)
    {
        $this->technos->removeElement($techno);
    }

    /**
     * Get technos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTechnos()
    {
        return $this->technos;
    }

}
