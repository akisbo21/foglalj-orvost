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

    public function getClinicIds()
    {
        $doctorClinic = DoctorClinic::find([
            'conditions' => 'doctor_id = :doctorId:',
            'bind' => [
                'doctorId' =>  $this->id
            ],
            'limit' => 20,
        ]);

        if (!$doctorClinic) {
            return [];
        }

        $clinicIds = [];
        foreach ($doctorClinic->toArray() as $row) {
            $clinicIds[] = $row['clinic_id'];
        }



        return $clinicIds;
    }

    /**
     * @return Clinic[]
     */
    public function getClinics()
    {
        $clinicIds = $this->getClinicIds();

        if (!$clinicIds) {
            return [];
        }

        return Clinic::find([
            'conditions' => 'id IN (' . implode(',', $clinicIds) . ')',
            'limit' => 20,
        ]);
    }

    public function toArrayWithClinics()
    {
        $result = $this->toArray();
        $result['clinics'] = $this->getClinics()->toArray();

        return $result;
    }
}
