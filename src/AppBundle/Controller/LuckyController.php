<?php
/**
 * Created by PhpStorm.
 * User: serj
 * Date: 22.11.16
 * Time: 23:06
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @return Response
     */

    public function NumberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig',
            ['number' => $number]
        );

    }

    public function LimitAction($min=0,$max=100)
    {
        $number = mt_rand($min,$max);

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        return $this->render('lucky/limit.html.twig',[
            'number' => $number,
            'min' => $min,
            'max' => $max,
        ]);
    }

    public function ListAction()
    {
        $array = [];

        for($i=0;$i<10;$i++)
            $array[] = mt_rand(0,100);

        return $this->render('lucky/list.html.twig',[
            'array' => $array
        ]);
    }

}

?>


