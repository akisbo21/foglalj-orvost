<?php

namespace Controller\Sample;

use Model\Sample\Doctor;
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->assets->addCss('css/style.css');

        $this->view->pick('sample/index');

        /** @var Doctor[] $doctors */
        $this->view->doctors = Doctor::find([
            'limit' => 20,
        ]);

//        echo '<pre>';
//        print_r($this->view->doctors[0]->toArray());
//        print_r($this->view->doctors[0]->getClinicIds());
//        print_r($this->view->doctors[0]->getClinics()->toArray());
//        die();

        $this->view->setLayout('main');
        $this->view->render('layouts', 'main');
    }
}
