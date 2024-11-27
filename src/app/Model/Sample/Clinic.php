<?php

namespace Model\Sample;

use Model\AbstractModel;

class Clinic extends AbstractModel
{
    protected $name;

    public function initialize()
    {
        // tabla neve
        $this->setSource('clinic');
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
