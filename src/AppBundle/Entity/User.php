<?php

/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 26.02.2017
 * Time: 19:30
 */

// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Ias\GameBundle\Entity\Gamer;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Ias\GameBundle\Entity\Gamer", mappedBy="user")
     */
    protected $gamer;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set gamer
     *
     * @param \Ias\GameBundle\Entity\Gamer $gamer
     *
     * @return User
     */
    public function setGamer(\Ias\GameBundle\Entity\Gamer $gamer = null)
    {
        $this->gamer = $gamer;

        return $this;
    }

    /**
     * Get gamer
     *
     * @return \Ias\GameBundle\Entity\Gamer
     */
    public function getGamer()
    {
        return $this->gamer;
    }
}
