<?php

class FancyRouter extends Router
{
    public function route($uri)
    {
        preg_match_all("%^/([A-Za-z0-9]+)%", $uri, $matches);

        echo "<pre>";
        print_r($matches);
        echo "</pre>";

        $controller = !empty($matches[0][1]) ? $_GET["controller"] : CONFIG["core"]["default"]["controller"];
        $action = !empty($matches[1][1]) ? $_GET["controller"] : CONFIG["core"]["default"]["controller"];

        return [
            "controller" => $controller,
            "action" => $action,
            "args" => []
        ];
    }

    public function link($controller, $action, $args)
    {
        return "/" . $controller . (!empty($action) ? "/" . $action : "");
    }
}