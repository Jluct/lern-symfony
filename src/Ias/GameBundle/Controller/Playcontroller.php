<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 09.03.2017
 * Time: 15:48
 */

namespace Ias\GameBundle\Controller;


use Ias\GameBundle\Service\Game\Play;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class PlayController extends Controller
{
    /**
     *  Получить данные игры
     *
     * @return JsonResponse $data
     */
    public function getDataAction()
    {

        /**
         * @var Play $play
         */
        $play = $this->get('play_services');
        
        return new JsonResponse($play->getGamePlay($this->getUser()->getId()));
    }

    /**
     * Возвращает текущий ход
     *
     * @return JsonResponse $data
     */
    public function getStepAction()
    {
        $data = [];

        /**
         * @var Play $play
         */
        $play = $this->get('play_service');
        $play->getGamePlay($this->getUser()->getId());

        $data["last"] = $play::getPlay()->getLast();
        $data["updated"] = $play::getPlay()->getUpdated();
        $data["action"] = $play::getPlay()->getAction();

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
     *
     * @param integer $id number game
     *
     * @return JsonResponse $data
     */
    public function getPrevStepAction($id)
    {
    }

}