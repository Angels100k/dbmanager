<?php 
session_start();
if(empty($_SESSION['Username'])){
    header('Location: index.php');
}

require ('classes/db.php');
require ('classes/sql.php');
$database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
$db = $database->getConnection();
$sqlQuery = new Sql($db['db']); 
$databasesarray = array();
$databases = $sqlQuery->databases();

   while ($row = $databases->fetch()){
    array_push($databasesarray, $row["Database"] );
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("layouts/head.php")?>
    <style>
        body {
          font-family: "Lato", sans-serif;
        }

        .sidenav {
          height: 100%;
          width: 270px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: auto;
          padding-top: 20px;
        }

        .sidenav a {
          padding: 6px 18px 6px 16px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
        }

        .sidenav a:hover {
          color: #f1f1f1;
        }

        .main {
          margin-left: 160px; /* Same as the width of the sidenav */
          font-size: 28px; /* Increased text to enable scrolling */
          padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
        
        .db_container_data.hover {
          color: #f1f1f1;
        }

        .db_container_data {
            margin-left: 2rem;
            color:dimgrey;
        }
    </style>
</head>
<body>
    <div class="sidenav">
        <?php
        foreach ($databasesarray as &$value) {
            echo '
                <a href="javascript:void(0);" onclick="databaseinfo(`'.$value.'`);"> '.$value .'</a>
                <div style="display:none;" id="container_'.$value.'"></div>
            ';
        }
        ?>
    </div>

    <table style="margin:5px 5px 5px 275px; width:calc(100% - 280px)" id="dbtable" class="table table-dark">
    </table>
    <script src="js/select.js"></script>
</body>
</html>