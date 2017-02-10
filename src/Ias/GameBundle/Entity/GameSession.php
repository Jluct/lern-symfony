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
     * @var int
     *
     * @ORM\Column(name="game_id", type="integer")
     */
    private $gameId;

    /**
     * @var int
     *
     * @ORM\Column(name="gamer_id", type="integer")
     */
    private $gamerId;

    /**
     * @var int
     *
     * @ORM\Column(name="parent", type="integer", nullable=true)
     */
    private $parent;

    /**
     * @var bool
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Gamer", inversedBy="games")
     * @ORM\JoinColumn(name="gamer_id", referencedColumnName="id")
     */
    private $gamer;


    /**
     * @return boolean
     */
    public function isCreated()
    {
        return $this->created;
    }

    /**
     * @param boolean $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
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
     * Set gameId
     *
     * @param integer $gameId
     *
     * @return GameSession
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * Get gameId
     *
     * @return int
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set gamerId
     *
     * @param integer $gamerId
     *
     * @return GameSession
     */
    public function setGamerId($gamerId)
    {
        $this->gamerId = $gamerId;

        return $this;
    }

    /**
     * Get gamerId
     *
     * @return int
     */
    public function getGamerId()
    {
        return $this->gamerId;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     *
     * @return GameSession
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }
}

