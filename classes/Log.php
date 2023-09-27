<?php

namespace ApmsKit\Core;

class Log
{
    public static function add(string $content, string $type = "ERROR"): bool
    {
        $date = date('m/d/Y - H:i:s');
        try {
            $txt = "[{$date}]: ({$type}) $content\n\n";
            file_put_contents('../master_log.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}