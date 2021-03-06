<?php

require "basicRouter.php";

class Application
{
    static protected $instance;
    protected $router;

    function __construct()
    {
        $this->router = new BasicRouter($this);
        self::$instance = $this;
    }

    static public function getInstance()
    {
        if(self::$instance == null) return new Application();
        return self::$instance;
    }

    function start($uri=null)
    {
        if(is_null($uri)) $uri = $_SERVER["REQUEST_URI"];
        $this->startWithRequest($this->router->route($uri));
    }

    function startWithRequest($req)
    {
        if($this->isController($req["controller"])) {
            $controller = $this->getController($req["controller"]);
            if($this->isActionOnController($controller, $req["action"])) {
                try {
                    $this->execActionOnController($controller, $req["action"]);
                } catch(Exception $ex) {
                    $this->handleError(500);
                }
                return;
            }
        }
        $this->handleError(404);
    }

    function handleError($code)
    {
        $this->startWithRequest([
            "controller" => "error",
            "action" => $code
        ]);
    }

    public function getController($controller)
    {
        $controllerName = $controller . "Controller";
        require(CONFIG["core"]["controllers"] . "/" . $controller . ".php");
        $controller = new $controllerName($this);
        return $controller;
    }

    public function isController($controller)
    {
        return file_exists(CONFIG["core"]["controllers"] . "/" . $controller . ".php");
    }

    public function isActionOnController($controller, $action)
    {
        return method_exists($controller, "_" . $action);
    }

    public function execActionOnController($controller, $action)
    {
        $actionF = "_" . $action;
        return $controller->$actionF();
    }

    public function getService($service)
    {
        require(CONFIG["core"]["services"] . "/" . $service . ".php");
        return new $service($this);
    }

    public function isService($service)
    {
        return file_exists(CONFIG["core"]["services"] . "/" . $service . ".php");
    }

    public function link($controller, $action="index")
    {
        return $this->router->link($controller, $action, null);
    }
}
