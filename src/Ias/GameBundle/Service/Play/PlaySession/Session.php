<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 14:13
 */

namespace Ias\GameBundle\Service\PlaySession;


use Ias\GameBundle\Service\PlayGame\Game;

class Session
{
    private static $_session = null;
    private $game = null;

    /**
     * @return Game $game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param Game $game
     */
    public function setGame(Game $game)
    {
        $this->game = $game;
    }

    private function __constructor()
    {

    }

    public static function getSession(Game $game = null)
    {
        if (empty(self::$_session))
            self::$_session = new self($game);

        return self::$_session;
    }


}