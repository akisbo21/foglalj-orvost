<?php

namespace Controller\Sample;

use Controller\AuthenticatedApiController;
use Model\Sample\Doctor;
use Service\Filter;

class SearchController extends AuthenticatedApiController
{
    public function indexAction()
    {
        $name = $this->request->get('name', Filter::FILTER_SAFE_STRING);

        return Doctor::find([
            'conditions' => 'name LIKE :name:',
            'bind' => ['name' => '%' . $name . '%'],
            'limit' => 20,
        ]);
    }
}
