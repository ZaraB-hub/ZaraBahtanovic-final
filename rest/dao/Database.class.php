<?php

class Database
{
    private  $servername = "localhost";
    private  $username = "root";
    private  $password = "uniburch";
    private  $db = "quiz";

    public static function conn()
    {
        try {
            // $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
            $conn = new PDO("mysql:host=localhost;dbname=quiz","root", "uniburch");

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
