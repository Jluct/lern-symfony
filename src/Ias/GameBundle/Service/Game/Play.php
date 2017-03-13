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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

final class Play
{
    private static $_instance = null;

    private $manager = null;
    private $game_session = null;
    private $access = false;
    /**
     * @var \Ias\GameBundle\Entity\Play
     */
    private $play = null;

    /**
     * @return null
     */

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

        return $this->play;
    }

    public function getGamePlay($user_id)
    {
        if ($this->play != null)
            return $this->play;

        $play = $this->manager->getRepository('IasGameBundle:Play')->getPlay($user_id);

        if ($play != null)
            $this->play = $play[0];

        VarDumper::dump($this->play);
        return $this->play;

    }

    public function getProperties()
    {
        $data['id'] = $this->play->getId();
        $data['history'] = $this->play->getHistory();
        $data['updated'] = $this->play->getUpdated()->format('d:m:Y H:i:s');//date('d:m:Y H:i:s', $this->play->getUpdated());
        $data['players'] = $this->play->getPlayers();
        $data['last'] = $this->play->getLast();
        $data['action'] = $this->play->getAction();

        return $data;
    }

    /**
     * @param Response ->request $request
     * @param $user_id integer
     * @return bool
     * @throws \Exception
     */
    public function refreshPlay($request, $user_id)
    {
        if ($this->access == false)
            return false;

        $history = $this->play->getHistory();
        $history[] = $request->get("action");
        $this->play->setHistory($history);
//        return $history;

        $this->play->setUpdated(new \DateTime());
        $this->play->setAction($request->get("action"));
        $this->play->setLast($user_id);

        try {
            $em = $this->manager;
            $em->persist($this->play);
            $em->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception('not save');
        }
    }


    /**
     * @param $user_id integer
     * @return boolean
     */
    public function accessStep($user_id)
    {

        $position = array_search($this->play->getLast(), $this->play->getPlayers());

        VarDumper::dump($position);


        if ($position===false)
            return false;

        if ($position == count($this->play->getPlayers()) - 1) {
            $position = 0;
        } else {
            $position++;
        }

        $current = $this->play->getPlayers()[$position];

        return $this->access = $current == $user_id;


    }


}