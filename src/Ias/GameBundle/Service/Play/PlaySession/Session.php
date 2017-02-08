<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 14:13
 */

namespace Ias\GameBundle\Service\PlaySession;


use Ias\GameBundle\Entity\Game;
use Symfony\Component\DependencyInjection\Container;

final class Session
{
    private static $_session = null;
    private $game = null;

    private function __constructor()
    {

    }

    public static function getSession()
    {
        if (empty(self::$_session))
            self::$_session = new self();

        return self::$_session;
    }

    public function openSession($id)
    {
        return $id;
    }

    public function initSession(Game $game)
    {
        $this->game = $game;
        return $game;
    }

    public function hasSession($id)
    {
        return $id == $id;
    }

    public function deleteSession($id)
    {
        return $id;
    }


}