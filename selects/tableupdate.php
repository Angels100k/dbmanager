<?php 
session_start();

require ('../classes/db.php');
require ('../classes/sql.php');
$database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
$db = $database->getConnection();
$sqlQuery = new Sql($db['db']);

$data = $sqlQuery->updatetable($_SESSION['db'], $_GET["table"], $_GET["newName"]);

$file = 'people.json';
// Open the file to get existing content
// Append a new person to the file
$current = json_encode($_GET);
// Write the contents back to the file
file_put_contents($file, $current);
return $_GET; 