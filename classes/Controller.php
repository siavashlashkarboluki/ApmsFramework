<?php
namespace ApmsKit\Core;

class Controller{
    public function do_action(string $controller, string $action, array $params = [], array $queries = []):bool{
        $controller = "\\ApmsKit\\Controllers\\$controller";
        if(class_exists($controller)){
            $class = new $controller();
            if(method_exists($class,$action)){
                $class->{$action}($params,$queries);
                return true;
            }
        }

        return false;
    }
}