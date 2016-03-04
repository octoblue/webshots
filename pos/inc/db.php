<?php
session_start();
class Db {
    /**
     * @return mysqli
     */
    public static function dbConnect(){
        $servername = "localhost";
        $username = "rabihtouma";
        $password = "Mallifa10";
        $dbname = "compushop";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

}






