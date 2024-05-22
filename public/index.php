<?php

define('ROOT', dirname(__DIR__));

require __DIR__ . '/../vendor/autoload.php';

$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $route)
{
    $routes = require ROOT . '/routes.php';
    $routes($route);
});

$http_method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route_info = $dispatcher->dispatch($http_method, $path);

switch ($route_info[0])
{
    case \FastRoute\Dispatcher::NOT_FOUND:
        echo 'NOT_FOUND';
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo 'METHOD_NOT_ALLOWED';
        break;
    case \FastRoute\Dispatcher::FOUND:
        [,$handler, $vars] = $route_info;
        call_user_func($handler, $vars);
        break;
}