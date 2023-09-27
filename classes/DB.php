<?php

namespace ApmsKit\Core;

use mysqli;

class DB
{
    public mixed $con;
    private string $db_host;
    private string $db_user;
    private string $db_pass;
    private string $db_name;


    function __construct(string $host, int $port, string $user, string $pass, string $db)
    {
        $this->db_host = "{$host}:{$port}";
        $this->db_user = $user;
        $this->db_pass = $pass;
        $this->db_name = $db;
    }

    function createConnection()
    {
        try {
            $this->con = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if (!$this->con) {
                return false;
            }
            $this->con->set_charset("utf8");
        } catch (\Exception $e) {
            Log::add($e,"ERROR");
            return false;
        }
        return true;
    }
}