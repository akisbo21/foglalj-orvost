<?php

namespace Model\Sample;

use Model\AbstractModel;

class DoctorClinic extends AbstractModel
{
    protected static $useStatusFilter = false;

    protected $doctor_id;
    protected $clinic_id;

    public function initialize()
    {
        // tabla neve
        $this->setSource('doctor_clinic');
    }

    public function getDoctorId()
    {
        return $this->doctor_id;
    }

    public function setDoctorId($doctor_id): void
    {
        $this->doctor_id = $doctor_id;
    }

    public function getClinicId()
    {
        return $this->clinic_id;
    }

    public function setClinicId($clinic_id): void
    {
        $this->clinic_id = $clinic_id;
    }
}
