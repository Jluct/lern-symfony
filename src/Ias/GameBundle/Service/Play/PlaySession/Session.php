<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 14:13
 */

namespace Ias\GameBundle\Service\PlaySession;


use Ias\GameBundle\Entity\Game;
use Doctrine\Common\Persistence\ObjectManager;

final class Session
{
    private static $_session = null;
    private $game = null;
    private $manager = null;

    private function __constructor(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public static function getSession(ObjectManager $manager)
    {

        if (empty(self::$_session))
            self::$_session = new self($manager);

        return self::$_session;
    }

    /**
     * @param $id - сессии
     * @return mixed
     */
    public function openSession($id)
    {
        return $id;
    }

    /**
     * @param Game $game
     * @return Game
     */
    public function initSession(Game $game)
    {
        $this->game = $game;



        return $this;
    }

    /**
     * @param $id
     * @return bool
     */

    public function hasPlaySession($id)
    {
        return $id == $id;
    }

    /**
     * @param $id - сессия
     * @return mixed
     */
    public function deleteSession($id)
    {
        return $id;
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }


}