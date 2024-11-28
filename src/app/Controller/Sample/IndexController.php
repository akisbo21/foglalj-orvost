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

        $this->view->doctors = Doctor::find([
            'limit' => 20,
        ]);

        $this->view->setLayout('main');
        $this->view->render('layouts', 'main');
    }
}
