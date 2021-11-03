<?php 
session_start();

require ('../classes/db.php');
require ('../classes/sql.php');
$database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
$db = $database->getConnection();
$sqlQuery = new Sql($db['db']);

$data = $sqlQuery->getTable($_GET["db"],$_GET["table"]);
$databasekey = array();
$databasevalue = array();
$databasefinal = array();
$i=0;
foreach ($data->fetch() as $key => $value){
  
}

while ($row = $data->fetch())
{
    if($i % 2 == 0){
        // echo json_encode(key($row));
        while ($fruit_name = current($row)) {
            echo key($row), "\n";
            next($row);
        }
//     array_push($databasekey, $key);
    //     array_push($databasevalue, array($key => $value));
    //      }
    //  //    array_push($databasekey, $key);
    //  //    array_push($databasevalue, array($key => $value));
    }
     $i++;
}
array_push($databasefinal, $databasekey);
array_push($databasefinal, $databasevalue);

// echo json_encode($databasefinal);