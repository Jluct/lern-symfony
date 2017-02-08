<?php

namespace Ias\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GameSession
 *
 * @ORM\Table(name="GameSession")
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
     * @var bool
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    private $valid;

    /**
     * @var array
     *
     * @ORM\Column(name="command", type="array")
     */
    private $command;

    /**
     * @var array
     *
     * @ORM\Column(name="oponets", type="array")
     */
    private $opponents;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;


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
     * Set valid
     *
     * @param boolean $valid
     *
     * @return GameSession
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return bool
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set command
     *
     * @param array $command
     *
     * @return GameSession
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return array
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set opponents
     *
     * @param array $opponents
     *
     * @return GameSession
     */
    public function setOpponents($opponents)
    {
        $this->opponents = $opponents;

        return $this;
    }

    /**
     * Get opponents
     *
     * @return array
     */
    public function getOpponents()
    {
        return $this->opponents;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return GameSession
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}
