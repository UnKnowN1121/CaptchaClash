<?php
session_start();
include("./vars.php");  


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO $table VALUES ('".$_SESSION['roll']."', '".$_SESSION['roll2']."',".$_SESSION['phone'].",".$_SESSION['right'].",".$_SESSION['wrong'].")";
    // use exec() because no results are returned
    $conn->exec($sql);
    header("Location: ". $domain. "/clear.php");
    die();
    }
catch(PDOException $e)
    {
    echo " <BR> <BR>HELLO THERE, SEEMS LIKE YOU HAVE AN ERROR, ASK SOMEONE TO HELP YOU OUT <BR>" . $e->getMessage();
    }

$conn = null;
?> 