<?php

namespace Ias\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Storage
     * 
     * @ORM\OneToMany(targetEntity="Storage", mappedBy="game")
     */
    private $storage;

    /**
     * @ORM\OneToMany(targetEntity="GameSession", mappedBy="game")
     */
    private $gameSession;

    public function __construct()
    {
        $this->gameSession = new ArrayCollection();
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

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Game
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

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
     * Set description
     *
     * @param string $description
     *
     * @return Game
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add gameSession
     *
     * @param \Ias\GameBundle\Entity\GameSession $gameSession
     *
     * @return Game
     */
    public function addGameSession(\Ias\GameBundle\Entity\GameSession $gameSession)
    {
        $this->gameSession[] = $gameSession;

        return $this;
    }

    /**
     * Remove gameSession
     *
     * @param \Ias\GameBundle\Entity\GameSession $gameSession
     */
    public function removeGameSession(\Ias\GameBundle\Entity\GameSession $gameSession)
    {
        $this->gameSession->removeElement($gameSession);
    }

    /**
     * Get gameSession
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGameSession()
    {
        return $this->gameSession;
    }

    /**
     * Add storage
     *
     * @param \Ias\GameBundle\Entity\Storage $storage
     *
     * @return Game
     */
    public function addStorage(\Ias\GameBundle\Entity\Storage $storage)
    {
        $this->storage[] = $storage;

        return $this;
    }

    /**
     * Remove storage
     *
     * @param \Ias\GameBundle\Entity\Storage $storage
     */
    public function removeStorage(\Ias\GameBundle\Entity\Storage $storage)
    {
        $this->storage->removeElement($storage);
    }

    /**
     * Get storage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStorage()
    {
        return $this->storage;
    }
}
