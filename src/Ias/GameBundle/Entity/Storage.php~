<?php

namespace Ias\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Storage
 *
 * @ORM\Table(name="storage")
 * @ORM\Entity(repositoryClass="Ias\GameBundle\Repository\StorageRepository")
 */
class Storage
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
     * @var string - массив ходов игроков. Формат произвольный для каждой игры
     *
     * @ORM\Column(name="resources", type="text")
     */

    private $resources;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="storage")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;

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
     * Set resources
     *
     * @param string $resources
     *
     * @return Storage
     */
    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Get resources
     *
     * @return string
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Set game
     *
     * @param \Ias\GameBundle\Entity\Game $game
     *
     * @return Storage
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
