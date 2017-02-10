<?php

namespace Ias\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaySession
 *
 * @ORM\Table(name="play_session")
 * @ORM\Entity(repositoryClass="Ias\GameBundle\Repository\PlaySessionRepository")
 */
class PlaySession
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
     * @ORM\Column(name="gameSession_id", type="integer")
     */
    private $gameSessionId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="step", type="text")
     */
    private $step;

    /**
     * @var bool
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * Set gameSessionId
     *
     * @param integer $gameSessionId
     *
     * @return PlaySession
     */
    public function setGameSessionId($gameSessionId)
    {
        $this->gameSessionId = $gameSessionId;

        return $this;
    }

    /**
     * Get gameSessionId
     *
     * @return int
     */
    public function getGameSessionId()
    {
        return $this->gameSessionId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return PlaySession
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set step
     *
     * @param string $step
     *
     * @return PlaySession
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return string
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set status
     *
     * @param boolean $created
     *
     * @return PlaySession
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getCreated()
    {
        return $this->created;
    }
}
