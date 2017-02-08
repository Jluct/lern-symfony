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


class PlayController extends Controller
{
    public function initAction($id, $player)
    {
        //$play = $this->get("ias_game.play_service.play"); //Экземпляр сессии
        //$play->addSesssion(); //Записываем сессию в базу

        //return $this->render(); //Рендерим объект и возвращаем результат
    }
}