<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/__lib/main.php';

class database
{
    public static $conn = null;

    public static function getConnection()
    {
        if(self::$conn == null)
        {

        $servername = get_config('servername');
        $username = get_config('username');
        $password = get_config('password');
        $dbname = get_config('dbname');
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error)
        {
            die("Connection Failed!");
        }

        return $conn;
    }
    else
    {
        return self::$conn;
    }

    }
}