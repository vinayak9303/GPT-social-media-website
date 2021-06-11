<?php
include 'connection.php';
session_start();
if (isset($_SESSION['id'])) {
    header("Location: ./Dashboard/");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GPT | Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="images/logo.jpg" rel="icon">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="./Dashboard/plugins/sweetalert2/sweetalert2.min.css">
<style>
	body { 
  padding-right: 0px !important;
  overflow-y: hidden !important;
}
</style>
</head>
<body>
	
    <section class="hero-wrap" style="background-image: url('images/bg_5.jpg'); background-attachment:fixed;padding-top: 120px">
    	
    	<div class="container">
    		<div class="overlay"></div>
    	<div class="row justify-content-center">
		 <div class="col-md-5">
    	   <div class="card">
			<article class="card-body">
			<h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
			<hr>
		<form id="login" method="POST">
                <div class="form-group">
                 <label>Email</label>
                    <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                     </div>
                        <input name="email" class="form-control" placeholder="example@gmail.com" type="email" id="email" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group">
             <label>Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="******" type="password" name="pass" id="pass" required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Login  </button>
            </div> <!-- form-group// -->
             <p class="text-center"><a href="#" class="btn">Forgot password?</a></p>
        </form>
        </article>
        </div>
       </div>
      </div>
     </div>
    </section>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./Dashboard/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

<script type="text/javascript">
function loader(){
    
    $.blockUI({
        message: '<div class="loader"><svg class="circular" viewBox="25 25 50 50"> <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>',
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.7,
            cursor: 'wait'
        },
        css: {
            color: '#333',
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        },
    });

}
    $('#login').on('submit', function(e) {
      e.preventDefault();
        loader();
        $.ajax({
            url: './Dashboard/backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
                type:"login",
                mail:$('#email').val(),
                pass:$('#pass').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  Swal.fire(
                  'Success',
                  'Login successfully',
                  'success'
                ).then(function(){
            window.location.href = "./login.php";
        });
            }
                else if(data['success'] == 2){
                 Swal.fire(
                  'Warning',
                  'Insert correct data',
                  'warning'
                ).then(function(){
            location.reload();
        });

                }
                 else if(data['success'] == 3){
                 Swal.fire(
                  'Error',
                  'Your id is blocked for unblock id contact to the Administrator.',
                  'warning'
                ).then(function(){
            location.reload();
        });
            }
                else{
                  Swal.fire(
                  'Error',
                  'Enter valid email and password',
                  'error'
                ).then(function(){
            location.reload();
        });  
        }
            },
             error: function (response) {
        console.log("Error")
        console.log(response)
      }
        });    
        
        return false;
        
    });
   </script>
   
</body>
</html>