<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 08.02.2017
 * Time: 12:00
 */

namespace Ias\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ias\GameBundle\Entity\Game;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;


class PlayController extends Controller
{
    /**
     * Инициализация игровой сессии. Создание заявки на поиск оппонента
     * @param Request $request
     */
    public function initGameSessionAction(Request $request)
    {


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


        //      проверяем нет у пользователя другой активной сессии
        VarDumper::dump($this->getUser()->getGamer()->getGameSession());

        if ($this->getUser()->getGamer()->getGameSession() != null)
            throw $this->createAccessDeniedException('У вас уже открыта сессия');

        //      получаем сервис для работы с сессией
        $game_session = $this->get('play_session');


        //      загружаем сессию
        VarDumper::dump($game_session->loadGameSession($id));
        //      добавляем пользователю id сессии

        //      проверяем достигнуто ли максимальное кол-во игроков

        //      переводим сессию в закрытое состояние

        //      начинаем сессию матча

        //      или возвращаем на страницу списка игр

        VarDumper::dump($id);

        return new Response($id);
        //      return $this->redirectToRoute('ias_game_get_game_session');
        //      return new RedirectResponse($this->generateUrl('ias_game_get_game_session'));
    }

    public function deleteGameSessionAction($id)
    {

    }


}