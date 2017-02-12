<?php

namespace Ias\GameBundle\Entity;

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
}
