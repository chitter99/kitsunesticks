<?php

abstract class Router
{
    protected $app;
    public function __construct($app)
    {
        $this->app = $app;
    }

    abstract function route($uri);
    abstract function link($controller, $action, $args);
}