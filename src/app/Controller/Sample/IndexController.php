<?php

namespace Controller\Sample;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View\Simple;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('sample/index');
        $this->view->message = "Hello from the index action!";

        $this->view->setLayout('main');
        $this->view->render('layouts', 'main');
    }
}
