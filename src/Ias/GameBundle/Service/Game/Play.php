<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 04.03.2017
 * Time: 16:13
 */

namespace Ias\GameBundle\Service\Game;
use Doctrine\Common\Persistence\ObjectManager;

final class Play
{
    private static $_instance = null;

    private $manager = null;

    public static function getSession(ObjectManager $manager)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
            self::$_instance->manager = $manager;
        }

        return self::$_instance;
    }

    private function __constructor(){}

}