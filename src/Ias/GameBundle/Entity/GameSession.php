<?php

namespace Ias\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * GameSession
 *
 * @ORM\Table(name="game_session")
 * @ORM\Entity(repositoryClass="Ias\GameBundle\Repository\GameSessionRepository")
 */
class GameSession
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
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="gameSession")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;

    /**
     * @ORM\OneToMany(targetEntity="Gamer", mappedBy="gameSession")
     */
    private $gamer;

    public function __construct()
    {
        $this->gamer = new ArrayCollection();
        $this->created = new \DateTime();
    }


    public function getCountGameSession()
    {
        
    }

    /********************
    ** Гетеры и сетеры***
    ********************/


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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return GameSession
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set game
     *
     * @param \Ias\GameBundle\Entity\Game $game
     *
     * @return GameSession
     */
    public function setGame(\Ias\GameBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \Ias\GameBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Add gamer
     *
     * @param \Ias\GameBundle\Entity\Gamer $gamer
     *
     * @return GameSession
     */
    public function addGamer(\Ias\GameBundle\Entity\Gamer $gamer)
    {
        $this->gamer[] = $gamer;

        return $this;
    }

    /**
     * Remove gamer
     *
     * @param \Ias\GameBundle\Entity\Gamer $gamer
     */
    public function removeGamer(\Ias\GameBundle\Entity\Gamer $gamer)
    {
        $this->gamer->removeElement($gamer);
    }

    /**
     * Get gamer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGamer()
    {
        return $this->gamer;
    }
}
