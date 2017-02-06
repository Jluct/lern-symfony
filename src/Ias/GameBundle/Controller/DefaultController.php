<?php

namespace Ias\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $games = $this->getDoctrine()->getRepository('IasGameBundle:Game')->findAll();

        return $this->render('IasGameBundle:Default:index.html.twig', ['games' => $games]);
    }

    public function getGameAction($id)
    {
        return $this->render('IasGameBundle:Default:game.html.twig');

    }
}
