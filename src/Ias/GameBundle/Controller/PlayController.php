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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


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
     */
    public function joinGameSessionAction($id)
    {
        return new Response($id);

    }
    
    
}