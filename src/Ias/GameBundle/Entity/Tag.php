<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 20.02.2017
 * Time: 10:32
 */

namespace Ias\GameBundle\Entity;

class Tag
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}