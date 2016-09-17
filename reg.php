<!DOCTYPE html>
<?php include("./vars.php"); ?>
<html lang="en">
    <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
  font-family: 'FontAwesome';
  src: url('font/fontawesome-webfont.eot?v=3.2.1');
  src: url('font/fontawesome-webfont.eot?#iefix&v=3.2.1') format('embedded-opentype'), url('font/fontawesome-webfont.woff?v=3.2.1') format('woff'), url('font/fontawesome-webfont.ttf?v=3.2.1') format('truetype'), url('font/fontawesome-webfont.svg#fontawesomeregular?v=3.2.1') format('svg');
  font-weight: normal;
  font-style: normal;
}

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

.main{
  margin-top: 20px;
}

h1.title { 
  font-size: 50px;
  font-family: 'Oleo Script', cursive;
  font-weight: 400; 
  font-style: italic;
  text-shadow: 0 -1px 0 rgb(207, 132, 172), 0 1px 0 rgb(142, 9, 78), 0 0 40px rgba(0, 0, 0, 1);
}

hr{
  width: 10%;
  color: #fff;
}

.form-group{
  margin-bottom: 15px;
}

label{
  margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
  /*background-color: #fff;*/

    /* shadows and rounded borders 
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/


}

.main-center{
  margin-top: 30px;
  margin: 0 auto;
  max-width: 330px;
    padding: 40px 40px;

}

.login-button{
  margin-top: 5px;
  background-color: #cb0d70;
  color:#fff;
}

.login-register{
  font-size: 11px;
  text-align: center;

}




/*//////////////////
.spinner {
  width: 40px;
  height: 40px;
  margin: 100px auto;
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
}*/
</style>

    <!-- Website Font style -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Google Fonts -->

    <title>Admin</title>
  </head>
  <body>
    <div class="container">
      <div class="row main">
        <div class="panel-heading">
                 <div class="panel-title text-center">
                    <h1 class="neon-text title">Capta Clash 0.1v</h1>
                    <hr />
                  </div>
              </div> 
        <div class="main-login main-center">
          <form class="form-horizontal" method="post" action="core.php" id="ajaxform">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Roll Number of Team Member 1</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="roll2" id="roll2"  placeholder="Enter Roll Number of Team Member 1" required />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label"> Roll Number of Team Member 2</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="roll" id="roll"  placeholder="Enter Roll Number of Team Member 2" required />
                  
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Phone Number</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your phone Number" pattern="\d{10}" />
                </div>
              </div>
            </div>

            

            <div class="form-group ">
              <button class="btn btn-lg btn-block login-button" id="button1" name="button1" value="regbt">Start!</button>
            </div>

          </form>
          
        </div>
      </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){



    

$("#button1").click(function(e)
{
    var postData = $("#ajaxform").serializeArray();
    var formURL = $('#ajaxform').attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server

           if(data == 'OK'){

            document.location = "<?php echo $domain; ?>/rt.php";
           }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails    
            alert(errorThrown);  
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});
 
 //Submit  the FORM
 //$('#ajaxform').submit();

 });
      
    </script>
  </body>
</html>