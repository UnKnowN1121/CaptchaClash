<?php 
include("./vars.php");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "create table $table (roll varchar(8) unique,roll2 varchar(8) unique,phone bigint(10),correct int(2), wrong int(3));";
   
    // use exec() because no results are returned
    $conn->exec($sql);
    
   	echo "TABLE CREATED";
   
    }
catch(PDOException $e)
    {
    echo " <BR> <BR>HELLO THERE, SEEMS LIKE YOU HAVE AN ERROR, ASK SOMEONE TO HELP YOU OUT <BR>" . $e->getMessage();
    
    }

$conn = null;



?>