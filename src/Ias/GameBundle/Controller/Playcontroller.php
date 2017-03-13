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
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\VarDumper\VarDumper;

class PlayController extends Controller
{
    /**
     * Получить данные игры
     * @var Play $play
     * @return JsonResponse $data
     */
    public function getDataAction()
    {

        $em = $this->get('play_services');
        $em->getGamePlay($this->getUser()->getId());
        $data = $em->getProperties();


        return new JsonResponse($data);
    }

    /**
     * @param Request $request
     * @var Play
     * Установить новый ход игрока
     * @return JsonResponse boolean
     */
    public function setStepAction(Request $request)
    {

        $response = false;
        $id = $this->getUser()->getId();
        $em = $this->get('play_services');

        if ($em->getGamePlay($this->getUser()->getId()) == null)
            return false;

        if ($em->accessStep($id))
            $response = $em->refreshPlay($request->request, $id);
        
        //{"id":2,"history":[],"updated":"12:03:2017 12:01:26","players":[1,6],"last":6,"action":[]}
//        $data = new DateTime($request->request->get('updated'));
        return new JsonResponse($response);

    }

    /**
     * Получить предыдущий ход
     * @param integer $id number game
     * @return JsonResponse $data
     */
    public function getPrevStepAction($id)
    {
    }

}