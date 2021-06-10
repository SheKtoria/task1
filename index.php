<?php
use app\core\Router;
use app\core\Request;

ini_set('display_errors', 0);
require __DIR__ . '/vendor/autoload.php';


Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());