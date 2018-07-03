<?php

class BasicRouter extends Router
{
    public function route($uri)
    {
        return [
            "controller" => $_GET["controller"],
            "action" => $_GET["action"],
            "args" => []
        ];
    }

    public function link($controller, $action, $args)
    {
        return "index.php?controller=" . $controller . "&action=" . $action;
    }
}