<?php

class Controller
{
    private $dependentServices = [];

    protected function depend($service) {
        array_push($this->dependentServices, $service);
    }

    /*protected function __get($name)
    {
        if(in_array($name, $this->dependentServices)) {
            // Is a Service call
            // Load Service if not already loaded and return
        }
    }*/

    protected function renderView($name) {
        require CONFIG["core"]["views"] . "/" . $name . ".php";
    }
}