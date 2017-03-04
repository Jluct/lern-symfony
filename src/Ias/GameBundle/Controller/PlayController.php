<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 12:00
 */

namespace Ias\GameBundle\Controller;

use Ias\GameBundle\Form\GameListType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ias\GameBundle\Entity\Game;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;


class PlayController extends Controller
{
    /**
     * Инициализация игровой сессии. Создание заявки на поиск оппонента
     * @param Request $request
     *
     * @return Response
     */
    public function initGameSessionAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
            throw $this->createAccessDeniedException('Авторизуйтесь для начала игры');

        $current_gamer = $this->getUser()->getGamer();
        $game_session = $this->get('game_session');

        if ($current_gamer->getGameSession() != null)
            throw $this->createAccessDeniedException('У вас уже открыта сессия');

        $game_session->initGameSession($request->request->get("game_list")["Game"]);

        $current_gamer->setGameSession($game_session->getGameSession());
        $em = $this->getDoctrine()->getManager();
        $em->persist($current_gamer);
        $em->flush();

        $this->addFlash(
            'notice',
            'Заявка подана!'
        );

        if ($game_session->isMaxPlayers()) {
            //      начинаем сессию матча

//            return $this->redirectToRoute('ias_game_play_game');
        }

//        return new Response('test');

        return $this->redirectToRoute('ias_game_get_game_session');

    }

    /**
     * Присоединяемся к заявке и создаём сессию матча
     * @param integer $id
     *
     * @return Response
     */
    public function joinGameSessionAction($id)
    {
        //      проверяем авторизован ли ползователь
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
            throw $this->createAccessDeniedException('Авторизуйтесь для начала игры');

        $current_gamer = $this->getUser()->getGamer();
        //      проверяем нет у пользователя другой активной сессии
        if ($current_gamer->getGameSession() != null)
            //      проверяем открыта ли сессия матча
            //      если открыта переходим к матчу
            throw $this->createAccessDeniedException('У вас уже открыта сессия');

        //      получаем сервис для работы с сессией
        $game_session = $this->get('game_session');

        //      загружаем сессию
        if (!$game_session->loadGameSession($id)->checkedGameSession(true))
            return $this->redirectToRoute('ias_game_get_game_session');

        //      добавляем пользователю id сессии
        $current_gamer->setGameSession($game_session->getGameSession());
        $em = $this->getDoctrine()->getManager();
        $em->persist($current_gamer);
        $em->flush();

        //      проверяем достигнуто ли максимальное кол-во игроков и начинаем матч
        if ($game_session->isMaxPlayers()) {
            //      начинаем сессию матча


            //возвращаем ответ с кодом игры
            return $this->redirectToRoute('ias_game_play_game');
        }

        //      переводим сессию в открытое состояние
        $game_session->checkedGameSession();

        //      или возвращаем на страницу списка игр
        return $this->redirectToRoute('ias_game_get_game_session');

    }

    public function deleteGameSessionAction($id)
    {

    }

    public function isStartGameSessionAction()
    {
        //      проверяем авторизован ли ползователь
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
            throw $this->createAccessDeniedException('Авторизуйтесь для начала игры');

        $data = ['start' => false];

        $game = $this->getUser()->getGamer();

        if (!empty($game->getGameSession()) && $game->getGameSession()->getStatus())
            $data['start'] = true;

//        $game_session = $this->get('game_session');
//
//        if (!$game_session->loadGameSession($id)->checkedGameSession(true))
//            return $this->redirectToRoute('ias_game_get_game_session');

//        if ($game_session->isMaxPlayers()) {
        //      начинаем сессию матча

//            return $this->redirectToRoute('ias_game_play_game');
//        }


        return new JsonResponse($data);

    }

    public function PlayAction()
    {
        //      проверяем авторизован ли ползователь
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
            throw $this->createAccessDeniedException('Авторизуйтесь для начала игры');

        $current_gamer = $this->getUser()->getGamer();
        //      проверяем нет у пользователя другой активной сессии
        if ($current_gamer->getGameSession() == null)
            //      проверяем открыта ли сессия матча
            //      если открыта переходим к матчу
            return $this->redirectToRoute('ias_game_get_game_session');

        $game_session = $this->get('game_session');

        //      получаем сервис для работы с сессией
        if (!$game_session->loadGameSession($current_gamer->getGameSession()->getId()))
            return $this->redirectToRoute('ias_game_get_game_session');

        

        return new Response("START!");

    }

}