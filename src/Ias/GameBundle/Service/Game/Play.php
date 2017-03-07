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
    private $play = null;

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
        $players = [];

        $play = new P();
        $play->setGameSession($game_session);

        $gamers = $this->manager->getRepository('IasGameBundle:Gamer')->getGamersForSession($game_session->getId());
        shuffle($gamers);

        for ($i = 0; $i < count($gamers); $i++) {
            $players[] = $gamers[$i]['id'];
        }

        $play->setPlayers($players);
        $play->setLast($players[count($players) - 1]);
        $play->setHistory([]);
        $play->setAction([]);
        $play->setUpdated(new \DateTime());


        $this->manager->persist($play);
        $this->manager->flush();

        $this->play = $play;
        VarDumper::dump($this->play);
        return $this->play;
    }

    public function getGamePlay($user_id)
    {
        $play = $this->manager->getRepository('IasGameBundle:Play')->getPlay($user_id);

        if ($play != null) {
            $this->play = $play;
            return $play;
        }

        return null;
    }


}