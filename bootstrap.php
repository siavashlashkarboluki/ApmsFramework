<?php

use ApmsKit\Core\DB;
use ApmsKit\Core\ErrorHandling;
use ApmsKit\Core\Http;


$db_initialize = new DB(DB_HOST,DB_PORT,DB_USER,DB_PASS,DB_NAME);
$db_initialize_result = $db_initialize->createConnection();
if ($db_initialize_result) {
    $dbcon = $db_initialize->con;
} else {
    Http::response(ErrorHandling::error_maker('DB_CONNECTION_ERROR'));
    exit(0);
}