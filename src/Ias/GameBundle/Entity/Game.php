<?php

namespace Ias\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="Ias\GameBundle\Repository\GameRepository")
 */
class Game
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="minCountPlayers", type="integer")
     */
    private $minCountPlayers;

    /**
     * @var int
     *
     * @ORM\Column(name="maxCountPlayers", type="integer")
     */
    private $maxCountPlayers;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, unique=false)
     */
    private $image;

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * Set name
     *
     * @param string $name
     *
     * @return Game
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set minCountPlayers
     *
     * @param integer $minCountPlayers
     *
     * @return Game
     */
    public function setMinCountPlayers($minCountPlayers)
    {
        $this->minCountPlayers = $minCountPlayers;

        return $this;
    }

    /**
     * Get minCountPlayers
     *
     * @return int
     */
    public function getMinCountPlayers()
    {
        return $this->minCountPlayers;
    }

    /**
     * Set maxCountPlayers
     *
     * @param integer $maxCountPlayers
     *
     * @return Game
     */
    public function setMaxCountPlayers($maxCountPlayers)
    {
        $this->maxCountPlayers = $maxCountPlayers;

        return $this;
    }

    /**
     * Get maxCountPlayers
     *
     * @return int
     */
    public function getMaxCountPlayers()
    {
        return $this->maxCountPlayers;
    }
}
