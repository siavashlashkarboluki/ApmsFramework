<?php

global $routes_collection;

use ApmsKit\Core\Router\Routing;
use ApmsKit\Core\Http;
use ApmsKit\Core\ErrorHandling;
use ApmsKit\Core\Controller;

$routing = new Routing($_SERVER['REQUEST_METHOD'], $_SERVER['QUERY_STRING'], 'route');

if ($routing->match($routes_collection->get())) {
    $controller = new Controller();
    if(!$controller->do_action($routing->getController(), $routing->getAction(), $routing->getParams(), $routing->getQueries())){
        Http::response(ErrorHandling::error_maker('ROUTE_NOT_FOUND'));
    }
} else {
    Http::response(ErrorHandling::error_maker('ROUTE_NOT_FOUND'));
}