<?php

session_start();
error_reporting(E_WARNING | E_ERROR);

define("INC_ROOT", __DIR__);

require __DIR__ . "/config.php";

require __DIR__ . "/core/controller.php";
require __DIR__ . "/core/router.php";
require __DIR__ . "/core/app.php";

require __DIR__ . "/service/auth.php";

require_once __DIR__ . '/core/lib/meekrodb.2.3.class.php';
DB::$user = CONFIG["db"]["user"];
DB::$password = CONFIG["db"]["pass"];
DB::$dbName = CONFIG["db"]["db"];
