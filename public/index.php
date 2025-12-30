<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/function.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path($class . '.php');
});


view('bootstrap.php');

$router = new core\Router();

$routs = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];


$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();