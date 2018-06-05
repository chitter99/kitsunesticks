<?php

class App
{
    function __construct()
    {
        $this->bootstrap();
    }

    function bootstrap()
    {
        $request = $this->checkRequest($this->parseURL());
        $this->execRequest($request);
    }

    function checkRequest($request)
    {
        if(!$this->isController($request["controller"]) || !$this->isActionOnController($request["controller"], $request["action"])) {
            $request = [
                "controller" => "error",
                "action" => "404"
            ];
        }
        return $request;
    }

    function parseURL()
    {
        $controller = $_GET["controller"];
        if(!isset($_GET["controller"])) {
            $controller = CONFIG["core"]["default"]["controller"]; // Default Controller
        }
        $action = $_GET["action"];
        if(!isset($_GET["action"])) {
            $action = CONFIG["core"]["default"]["action"]; // Default Controller Action
        }
        return array(
            "controller" => $controller,
            "action" => $action
        );
    }

    function execRequest($request)
    {

    }

    public function getController($controller)
    {
        require(CONFIG["core"]["controllers"] . $controller . ".php");
        $controller = new $controller;
        $controller->onLoad($this);
        return $controller;
    }

    public function isController($controller)
    {
        return file_exists(CONFIG["core"]["controllers"] . $controller . ".php");
    }

    public function isActionOnController($controller, $action)
    {
        return method_exists($controller, "_" . $action);
    }

    public function getService($service)
    {
        require(CONFIG["core"]["services"] . $service . ".php");
        return new $service;
    }

    public function isService($service)
    {
        return file_exists(CONFIG["core"]["services"] . $service . ".php");
    }
}
