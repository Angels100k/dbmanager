<?php 
session_start();

require ('../classes/db.php');
require ('../classes/sql.php');
$database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
$db = $database->getConnection();
$sqlQuery = new Sql($db['db']);

$data = $sqlQuery->getdb($_GET["database"]);
$databasesarray = array();
while ($row = $data->fetch()){
    array_push($databasesarray, $row["Tables_in_" . $_GET["database"]]);
}
echo json_encode($databasesarray);