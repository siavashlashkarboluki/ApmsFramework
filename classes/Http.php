<?php
    namespace ApmsKit\Core;

    class Http{
        public static function response(array $data):void{
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data,JSON_PRESERVE_ZERO_FRACTION|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }

        public static function getIP():string
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }

        public static function getHeaderValue(string $header_name):mixed{
            if(issset($_SERVER[$header_name])){
                return $_SERVER[$header_name];
            }

            return false;
        }
    }