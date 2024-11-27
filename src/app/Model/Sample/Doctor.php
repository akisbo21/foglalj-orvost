<?php

namespace Model\Sample;

use Model\AbstractModel;

class Doctor extends AbstractModel
{
    protected $name;
    protected $specialty;

    public function initialize()
    {
        // tabla neve
        $this->setSource('doctor');
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSpeciality()
    {
        return $this->specialty;
    }

    public function setSpeciality($specialty)
    {
        $this->specialty = $specialty;
    }
}
