<?php 
session_start();

require ('../classes/db.php');
require ('../classes/sql.php');
$database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
$db = $database->getConnection();
$sqlQuery = new Sql($db['db']);

$structure = $sqlQuery->getTableStructure($_SESSION["db"],$_GET["table"]);

$databasekey = array();
$databasevalue = array();
$databasefinal = array_fill_keys(
    array('key', 'value'), array());


while ($row = $structure->fetch()){
    array_push($databasekey, $row["Field"]);
}

array_push($databasefinal["key"], $databasekey);

$data = $sqlQuery->getTable($_SESSION["db"],$_GET["table"]);
while ($row = $data->fetch()){
    $i=0;
    $databaseval = array();

    foreach ($row as $key => $value) {
        if($i % 2 == 0){
            array_push($databaseval, $value);
        }
        $i++;
    }
    array_push($databasevalue, $databaseval);
}
array_push($databasefinal["value"], $databasevalue);

$databasefinal["key"] = $databasefinal["key"][0];
$databasefinal["value"] = $databasefinal["value"][0];

echo json_encode($databasefinal);