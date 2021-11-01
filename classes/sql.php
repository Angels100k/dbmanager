<?php 
class Sql {
  // set varriable connnection so it can get accesst only in this file in every function
    private $conn;

    // __construct is used on startup when the class is being called
    public function __construct($db) {
      // the variable $db is the data from db.php saved in the conn variable for global use
        $this->conn = $db;
    }

    public function databases(){
      $sql = "SHOW DATABASES";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt;
    }

    public function getdb($db){
      $sql = "use " . $db . ";";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $sql = "show tables;";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt;
    }
}