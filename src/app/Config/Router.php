<?php

namespace Config;

class Router extends \Phalcon\Mvc\Router
{
    public function __construct(bool $defaultRoutes = true)
    {
        parent::__construct(false);

        $this->notFound([
            'controller' => 'Controller\\Index',
            'action' => 'notFound',
        ]);

        $this->add('/probe/liveness', 'Controller\\Probe::liveness');

        $this->add('/', 'Controller\\Sample\\Index::index');
        $this->add('/search', 'Controller\\Sample\\Search::index');
    }
}
