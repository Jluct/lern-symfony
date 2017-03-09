<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 09.03.2017
 * Time: 15:48
 */

namespace Ias\GameBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PlayController extends Controller
{
    /**
     *  Получить данные игры
     *
     * @param integer $id number game
     *
     * @return JsonResponse $data
     */
    public function getDataAction($id)
    {
        $data = [];

        return new JsonResponse($data);
    }

    /**
     * Возвращает текущий ход
     *
     * @param integer $id number game
     *
     * @return JsonResponse $data
     */
    public function getStepAction($id)
    {
        $data = [];

        return new JsonResponse($data);
    }

    /**
     * @param Request $request
     *  Установить новый ход игрока
     *
     * @return JsonResponse boolean
     */
    public function setStepAction(Request $request)
    {


        return new JsonResponse(false || true);
    }

    /**
     * Получить предыдущий ход
     */
    public function getPrevStepAction()
    {
    }

}