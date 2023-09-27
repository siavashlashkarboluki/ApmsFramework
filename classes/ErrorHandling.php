<?php

namespace ApmsKit\Core;

class ErrorHandling
{
    protected static array $errors_list = [
        'ROUTE_NOT_FOUND'=>100,
        'DB_CONNECTION_ERROR'=>101,
        'LOG_OPEN_FILE_ERROR'=>102,
        'LOG_CLOSE_FILE_ERROR'=>103
    ];

    public static function error_maker(string $error_const):array{
        $return_array = array();
        $error_const = strtoupper($error_const);
        if(array_key_exists($error_const,self::$errors_list)){
            $return_array['status'] = 'error';
            $return_array['error_code'] = self::$errors_list[$error_const];
            $return_array['error_message'] = $error_const;
        }
        return $return_array;
    }
}