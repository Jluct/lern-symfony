<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 14:13
 */

namespace Ias\GameBundle\Service\Game;


use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Ias\GameBundle\Entity\Game;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\VarDumper\VarDumper;

final class GameSession
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
        return $this;
    }

    public function checkedGameSession($status = null)
    {
        if (empty($this->game_session))
            return false;

        VarDumper::dump($this->game_session);

        if (empty($status))
            $this->game_session->setStatus(false == $this->game_session->isStatus());
        else
            $this->game_session->setStatus($status);

        try {
            $em = $this->manager;
            $em->persist($this->game_session);
            $em->flush();
            return true;
        } catch (Exception $e) {
            throw new Exception('not save');
        }
    }

    public function isMaxPlayers()
    {
        $game = $this->game_session->getGame();
        $count_game_session = $this->manager->getRepository('IasGameBundle:Gamer')->countSession($this->game_session->getId());
        VarDumper::dump($count_game_session);

        if ($game->getMaxCountPlayers() == $count_game_session)
            return true;

        return false;
    }

}
