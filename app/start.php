<?php

session_start();
error_reporting(E_WARNING | E_ERROR);

define("INC_ROOT", __DIR__);

require __DIR__ . "/config.php";

require __DIR__ . "/core/app.php";
require __DIR__ . "/core/controller.php";
