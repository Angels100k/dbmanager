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
    private function usedb($db){
      $sql = "use " . $db . ";";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
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

    public function updatetable($db, $table, $newName){
      $this->usedb($db);
      $sql = "ALTER TABLE $table RENAME TO $newName;";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    }

    public function getTableStructure($db, $table){
      $this->usedb($db);
      $sql = "DESCRIBE $table";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt;
    }
    
    public function getTable($db, $table){
      $this->usedb($db);
      $sql = "SELECT * FROM $table";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt;
    }
}