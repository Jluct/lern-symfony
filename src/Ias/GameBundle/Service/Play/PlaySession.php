<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 14:13
 */

namespace Ias\GameBundle\Service\Play;


use Ias\GameBundle\Entity\Game;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\VarDumper\VarDumper;

final class PlaySession
{
    private static $_instance = null;

    private $manager = null;
    private $game_session = null;

    /**
     * @return null
     */
    public function getGameSession()
    {
        return $this->game_session;
    }

    private function __constructor()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getSession(ObjectManager $manager)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
            self::$_instance->manager = $manager;
        }

        return self::$_instance;
    }

    public function loadGameSession($id)
    {
        $this->game_session = $this->manager->getRepository('IasGameBundle:GameSession')->loadGameSession($id);
        return $this->game_session;
    }

    public $test = 11111;

}
