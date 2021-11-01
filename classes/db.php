<?php

class Dbconfig {
    // personal sql server in XAMMP
    private $host = "";
    private $username;
    private $password;
    public $conn;

    public function __construct($username, $password) {
        // the variable $db is the data from db.php saved in the conn variable for global use
          $this->username = $username;
          $this->password = $password;
    }

    // Public function to start the database connection
    public function getConnection() {
        // $ this for means that its ment for the public $conn in db.php (this file)
        $this->conn = null;

        // try so if fails we can see what goes wrong
        try{
            // this connection variable start a PDO connection with the sql server
            $this->conn = new PDO("mysql:host=" . $this->host . ";", $this->username, $this->password);
            return array("error" => 0, "db" => $this->conn);

        // If there is an error it gets catched 
        }catch(PDOException $exception){
            // echo what is wrong with the connection
            return array("error" => 1, "errormessage" => $exception->getMessage());
        }
    } 
} 
?>