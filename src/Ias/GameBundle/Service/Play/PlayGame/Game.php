<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 14:10
 */

namespace Ias\GameBundle\Service\PlayGame;

use Ias\GameBundle\Entity\Game;
use Symfony\Component\DependencyInjection\Container;

class Game
{
    private $_entity;

    public function __construct($id)
    {
        if (!is_int($id))
            throw new \LogicException($id . " is not a number");
         $this->_entity = Container::camelize('doctrine');

    }

}