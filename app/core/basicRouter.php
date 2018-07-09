<?php

class BasicRouter extends Router
{
    public function route($uri)
    {
        return [
            "controller" => !empty($_GET["controller"]) ? $_GET["controller"] : CONFIG["core"]["default"]["controller"],
            "action" => !empty($_GET["action"]) ? $_GET["action"] : CONFIG["core"]["default"]["action"],
            "args" => []
        ];
    }

    public function link($controller, $action, $args)
    {
        return "index.php?controller=" . $controller . "&action=" . $action;
    }
}