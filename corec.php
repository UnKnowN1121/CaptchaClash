<?php
session_start();
$table = 0;
//if(isset($_POST['caps'])){
	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
		//Captcha verification is incorrect.	
		if(empty($_SESSION['wrong'] )) {
			$_SESSION['wrong'] = 1;
		}
		else{
			$_SESSION['wrong'] = $_SESSION['wrong'] + 1;
		}
		$table= array("right"=>$_SESSION['right'] , "isright"=>"no"); 
		
	}else{// Captcha verification is Correct. Final Code Execute here!				
		if(empty($_SESSION['right'])) {
			$_SESSION['right'] = 1;
		}
		else{
			$_SESSION['right'] = $_SESSION['right'] + 1;
		}
		$table= array("right"=>$_SESSION['right'] , "isright"=>"yes"); 
		
	}
$_SESSION['captcha_code'] = 0;
//}	

echo json_encode($table);
?>