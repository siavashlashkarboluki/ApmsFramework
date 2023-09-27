<?php

namespace ApmsKit\Core\Router;

use ApmsKit\Core\Http;
use ApmsKit\Core\ErrorHandling;

class Routing
{
    protected string $request_method, $request_query, $request_var, $controller, $action;
    protected array $params, $queries;

    function __construct(string $method, string $route, string $route_var)
    {
        $this->request_method = $method;
        $this->request_query = $route;
        $this->request_var = $route_var;
        $this->params = [];
        $this->queries = [];
    }

    function match(array $routes): bool
    {
        $params = explode("/", $_GET[$this->request_var]);
        foreach ($params as $key => $param) {
            if (empty($param)) {
                unset($params[$key]);
            }
        }

        if (count($params) > 0) {
            $pattern_base = "/";
            for ($i = 0; $i < count($params); $i++) {
                $pattern_base .= ($i == count($params) - 1) ? $params[$i] : "{$params[$i]}/";;
            }

            foreach ($routes as $route) {
                if (count($route['route_vars']) + 1 == substr_count($pattern_base, "/")) {
                    if (preg_match($route['route_pattern'], $pattern_base)) {

                        $this->controller = $route['route_controller'];
                        $this->action = $route['route_action'];

                        if (count($route['route_vars']) > 0) {
                            $index = 1;
                            $values = explode("/", $_GET[$this->request_var]);

                            foreach ($route['route_vars'] as $key => $var) {
                                $this->params[$var] = $values[$index];
                                $index++;
                            }
                        }

                        if ($route['route_method'] == "POST") {
                            foreach ($_POST as $key => $post) {
                                $this->queries[$key] = $post;
                            }
                        }

                        return true;
                    }
                }
            }
        }
        return false;
    }

    function getController(): string
    {
        return $this->controller;
    }

    function getAction(): string
    {
        return $this->action;
    }

    function getParams(): array
    {
        return $this->params;
    }

    function getQueries(): array
    {
        return $this->queries;
    }

}


