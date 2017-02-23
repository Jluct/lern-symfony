<?php

namespace Ias\GameBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Gamer
 *
 * @ORM\Table(name="gamer")
 * @ORM\Entity(repositoryClass="Ias\GameBundle\Repository\GamerRepository")
 */
class Gamer extends BaseUser
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
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @ORM\ManyToOne(targetEntity="GameSession", inversedBy="gamer")
     * @ORM\JoinColumn(name="gameSession_id", referencedColumnName="id")
     */
    private $gameSession;

    

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
