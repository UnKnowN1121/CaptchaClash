<?php 
session_start();
	if(isset($_SESSION['stime'])) {
		echo "OK";
	}

	elseif(isset($_POST['roll'])) {
	$_SESSION['roll'] = $_POST['roll'];
	$_SESSION['stime'] = time();
	$_SESSION['roll2'] = $_POST['roll2'];
	$_SESSION['phone'] = $_POST['phone'];
	$_SESSION['right'] = 0;
	$_SESSION['wrong'] = 0;
	/*
	include("./vars.php");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select 1 from $table where roll = '".$_SESSION['roll']."' or roll2 = '".$_SESSION['roll']."'";
   
    // use exec() because no results are returned
    $result = $conn->prepare($sql);
    $result->execute();
    $exists = 0
    if ($result){
    	while($row = $result->fetch(PDO::FETCH_ASSOC)){
    	$exists = $row['1'];
    }
    if($exists == 1){
    	header("Location: ".$domain."/reg.php");
    	die();
    }
    }
    

   
    }
catch(PDOException $e)
    {
    echo " <BR> <BR>HELLO THERE, SEEMS LIKE YOU HAVE AN ERROR, ASK SOMEONE TO HELP YOU OUT <BR>" . $e->getMessage();
    
    }

$conn = null;

////*/

	if(isset($_SESSION['roll'])){
		echo "OK";
	}
	else {
		echo "FAIL";
	}
}







?>