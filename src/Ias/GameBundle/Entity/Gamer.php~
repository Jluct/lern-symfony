<?php

namespace Ias\GameBundle\Entity;

use AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Gamer
 *
 * @ORM\Table(name="gamer")
 * @ORM\Entity(repositoryClass="Ias\GameBundle\Repository\GamerRepository")
 */
class Gamer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="login", type="string", length=255, nullable=true)
//     */
//    private $login;

    /**
     * @ORM\ManyToOne(targetEntity="GameSession", inversedBy="gamer")
     * @ORM\JoinColumn(name="gameSession_id", referencedColumnName="id")
     */
    private $gameSession;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", inversedBy="gamer")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Gamer
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set gameSession
     *
     * @param \Ias\GameBundle\Entity\GameSession $gameSession
     *
     * @return Gamer
     */
    public function setGameSession(\Ias\GameBundle\Entity\GameSession $gameSession = null)
    {
        $this->gameSession = $gameSession;

        return $this;
    }

    /**
     * Get gameSession
     *
     * @return \Ias\GameBundle\Entity\GameSession
     */
    public function getGameSession()
    {
        return $this->gameSession;
    }
}
