<?php 

 // starting the session
 session_start();
include("./vars.php");

 if ( isset($_SESSION['roll'],  $_SESSION['stime'])) { 
 $roundtime = 5 * 60;
 
$_SESSION["etime"] = $_SESSION["stime"] + $roundtime;

 } 
 else {
 	header("Location:". $domain."/reg.php");
 	die();
 	
 }

?> 

<!DOCTYPE html>
<html lang="en">
    <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="font/stylesheet.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>

    <!-- Website CSS style -->
  
      <style type="text/css">
    /*
/* Created by Filipe Pina
 * Specific styles of signin, register, component
 */
/*
 * General styles
 */

 @font-face {
  font-family: 'Oleo Script';
  src: url('font/OleoScript-Regular.ttf');

}

body, html{
     height: 100%;
 /* background-repeat: no-repeat;*/

  background-image: url('img/binding_dark.png');
  font-family: 'Oxygen', sans-serif;
  color: #cb0d70;
}

h1.title { 
  font-size: 50px;
  font-family: 'Oleo Script', cursive;
  font-weight: 400; 
  font-style: italic;
  text-shadow: 0 -1px 0 rgb(207, 132, 172), 0 1px 0 rgb(142, 9, 78), 0 0 40px rgba(0, 0, 0, 1);
}

.title{
	font-size: 50px;
  font-family: 'Oleo Script', cursive;
  text-shadow: 0 -1px 0 rgb(207, 132, 172), 0 1px 0 rgb(142, 9, 78);
   font-style: italic;



}

hr{
  width: 10%;
  color: #fff;
}
.spinner {
  width: 100px;
  height: 100px;
  margin: 10px auto;
  background-color: #333;

  border-radius: 100%;  
  -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
  animation: sk-scaleout 1.0s infinite ease-in-out;
}

@-webkit-keyframes sk-scaleout {
  0% { -webkit-transform: scale(0) }
  100% {
    -webkit-transform: scale(1.0);
    opacity: 0;
  }
}

@keyframes sk-scaleout {
  0% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 100% {
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
    opacity: 0;
  }
}
</style>

    <!-- Website Font style -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Google Fonts -->

    <title>Captcha Clash</title>
    <link rel="stylesheet" href="js/flipclock.css">

		<script src="js/flipclock.js"></script>
  </head>
  <body>
   <div class="container">
   		<div class="row">
   		<div class="col-md-12">
   		<div class="panel-heading">
                 <div class="panel-title text-center">
                    <h1 class="neon-text title">Capta Clash 0.1v</h1>
                    <hr />
                  </div>
              </div> 
   		</div>
   		</div>
      <div class="row main">

<div class="col-xs-1">
</div>
        <div class="col-xs-5">
            
            
             <p style="font-family:'League Gothic'; font-size: 40px;line-height:0.7;margin-left:1em"> You Have Started The Timer.</br> 

 </p>
             <p style="font-size: 25px;font-family:'League Gothic';margin-left:1em">Time Left</p>
             <p class="clock" style="margin-left:4em;"></p>
             <p style="font-size: 25px;font-family:'League Gothic';margin-left:1em">Correct CAPTCHAS Entered</p>
             <p class="clock2" style="margin-left:4em;"></p>
              <!--<div class="spinner"</div> -->
        </div>
        <div class="col-xs-5">
    
            <form action="corec.php" method="post" name="form1" id="form1" style="font-family:'League Gothic';font-size: 25px;">
 
   <center>
      <img src="captcha.php" id='captchaimg'><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="captcha_code" name="captcha_code" type="text">
        <br>
        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to Skip to another image.
   
    
      <button class="btn btn-lg btn-block" id="caps" name="caps" value="caps" style="height: 60px; width: 180px"> Submit! </button>
    </center>
</form>
        </div>
        <div class="col-xs-1"></div>








       
              
              
      </div>
	</div>
	  <script src="js/bootstrap.min.js"></script>
	  <script type="text/javascript">

		var clock;
		var d = "<?php echo $_SESSION['etime'] -time(); ?>";
		var clock2;
		var rightval=0;
		$(document).ready(function() {
			
			clock = $('.clock').FlipClock(d,{
		        clockFace: 'MinuteCounter',
		        countdown: true,
		        stop: function(){
		        	//$('#form1').hide();
		        	EndFunc();
		        },

		    });
		    clock2 = $('.clock2').FlipClock(rightval,{
		    	clockFace: 'counter',
		    })
 
		   
		    $("#caps").click(function(e)
{
    var postData = $("#form1").serializeArray();
    var formURL = $("#form1").attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        dataType: 'json',
        success:function(data, textStatus, jqXHR) 
        {
        	var jsonobj = data;
            //data: return data from server
            clock2.setValue(jsonobj.right);
            refreshCaptcha();
            
           
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails    
            alert(errorThrown);  
        }
    });
    e.preventDefault(); //STOP default action
    //e.unbind(); //unbind. to stop multiple form submit.
});
 
		});


function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src;
	document.getElementById('captcha_code').value = "";
}

function EndFunc(){
	$('#form1').html("Your Time Is Over your Results Are below,</br> Thank you for Partcipating!<?php
             
             echo "<p style='font-size: 25px;' ></br>Team Member 1:<span style='color:#FFF'> " . $_SESSION['roll2'] . "</span></br>Team Member 2:<span style='color:#FFF'>". $_SESSION['roll'] . "</span></br>Phone Number:<span style='color:#FFF'>". $_SESSION['phone'] . "</span></p>"?>");
	window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location = "<?php echo $domain; ?>/save.php";

    }, 10000);
}


	</script>
	 
      

  </body>
  </html>