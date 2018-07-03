<?php

define("CONFIG", [
    "db" => [],
    "core" => [
        "default" => [
            "action" => "index",
            "controller" => "home"
        ],
        "views" => INC_ROOT . "/views",
        "services" => INC_ROOT . "/service",
        "models" => INC_ROOT . "/model",
        "controllers" => INC_ROOT . "/controller",
    ]
]);

