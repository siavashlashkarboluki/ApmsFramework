<?php

namespace ApmsKit\Core\Router;
class RoutesCollection
{
    protected static mixed $routes = [];

    public function add(string $method,string $route_pattern, string $controller, string $action, array $vars): void
    {
        $r['route_method'] = strtoupper($method);
        $r['route_pattern'] = $route_pattern;
        $r['route_controller'] = $controller;
        $r['route_action'] = $action;
        $r['route_vars'] = $vars;
        array_push(self::$routes, $r);
    }

    public function get(): array
    {
        return self::$routes;
    }

    public function extractMainPattern():void{

    }
}