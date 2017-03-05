<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 04.03.2017
 * Time: 16:13
 */

namespace Ias\GameBundle\Service\Game;

use Ias\GameBundle\Entity\Play as P;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\VarDumper\VarDumper;

final class Play
{
    private static $_instance = null;

    private $manager = null;
    private $game_session = null;

    public static function getPlay(ObjectManager $manager)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
            self::$_instance->manager = $manager;
        }

        return self::$_instance;
    }

    private function __constructor()
    {
    }

    public function initPlay($game_session)
    {
        $play = new P();
        $play->setGameSession($game_session);

        $gamers = $this->manager->getRepository('IasGameBundle:Gamer')->getGamersForSession($game_session->getId());

        //shuffle
        VarDumper::dump($gamers);


    }

    public function getGamePlay($game_session)
    {

        $play = $this->manager->getRepository('IasGameBundle:Play')->getPlay($game_session->getId());

        if ($game_session != null) {
            $this->game_session = $game_session;
            return $play;
        }

        return null;
    }


}