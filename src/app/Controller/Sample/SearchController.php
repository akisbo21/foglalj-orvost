<?php

namespace Controller\Sample;

use Controller\AuthenticatedApiController;
use Model\Sample\Doctor;
use Service\Filter;

class SearchController extends AuthenticatedApiController
{
    public function indexAction()
    {
        $name = $this->request->getPut('name', Filter::FILTER_SAFE_STRING);

        return Doctor::find();
    }
}
