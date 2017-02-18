<?php
/**
 * Created by PhpStorm.
 * User: Inkognito
 * Date: 18.02.2017
 * Time: 22:35
 */

namespace Ias\GameBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Category
{
    /**
     * @Assert\NotBlank()
     */
    protected $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function getUpperName()
    {
        return strtoupper($this->name);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}