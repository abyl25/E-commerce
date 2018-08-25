<?php

// FRONT CONTROLLER

// settings
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// include files
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

// Call Router
$router = new Router();
$router->run();