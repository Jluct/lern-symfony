<?php

namespace Ias\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $games = $this->getDoctrine()->getRepository('IasGameBundle:Game')->findAll();
//        var_dump($games[0]);die;

        return $this->render('IasGameBundle:Default:index.html.twig', ['games' => $games]);
    }

    public function getGameAction()
    {
        $game_session = $this->getDoctrine()->getRepository('IasGameBundle:GameSession')->findAll();

        return $this->render('IasGameBundle:Default:game.html.twig',['game_session'=>$game_session]);

    }
}
