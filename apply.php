<!DOCTYPE html>
<html>
<head>
	<title>GPT | Register</title>
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
 
</head>
<body>
	

    <section class="" style="background-image: url('images/bg_5.jpg'); background-attachment:fixed;background-size: cover;background-position: center center;padding:47px">
    	<div class="container">
    	<div class="row d-flex justify-content-center">
		 <div class="col-md-6">
    	   <div class="card">
			<article class="card-body">
			<h4 class="card-title text-center mb-4 mt-1">Call Me Back Now <span style="color: #FF8C00">+91 9969601972</span></h4>
			<hr>
		<form id="callback" method="POST">
			<div class="form-group-sm">
			 <label>Name</label>
				<div class="input-group">
				 <div class="input-group-prepend">
		    		<span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 		 </div>
					<input name="name" id="name" class="form-control" placeholder="John Doe" type="text" required>
	            </div> <!-- input-group.// -->
	        </div> <!-- form-group// -->
	        <div class="form-group-sm">
		     <label>Email-id</label>
	          <div class="input-group">
		        <div class="input-group-prepend">
		          <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		        </div>
	            <input class="form-control" id="email" placeholder="example@gmail.com" type="email" required>
	          </div> <!-- input-group.// -->
	        </div> <!-- form-group// -->
	        <div class="form-group-sm">
			 <label>Mobile No.</label>
				<div class="input-group">
				 <div class="input-group-prepend">
		    		<span class="input-group-text"> <i class='fas fa-phone-alt'></i> </span>
		 		 </div>
					<input name="mobile" id="mobile" class="form-control" placeholder="012-345-6789" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"type="number" required>
	            </div> <!-- input-group.// -->
	        </div> <!-- form-group// -->
	        <div class="form-group-sm">
			 <label>Choose course</label>
				<div class="input-group">
				 <div class="input-group-prepend">
		    		<span class="input-group-text"> <i class="fas fa-book"></i> </span>
		 		 </div>
					<select name="course" id="course" class="form-control" required>
						 <option disabled selected hidden>---Select your course---</option>
						 <option value="Computer Engineering">Computer Engineering</option>
						  <option value="Mechanical Engineering">Mechanical Engineering</option>
						  <option value="Information Technology">Information Technology</option>
						  <option value="Civil Engineering">Civil Engineering</option>
						  <option value="Chemical Engineering">Chemical Engineering</option>
						  <option value="Travel and Tourism">Travel and Tourism</option>
						</select>
			</div> <!-- input-group.// -->
	        </div> <!-- form-group// -->
	        <div class="form-group-sm">
	        	<label>Have a Questions? </label>
				<div class="input-group">
				 <div class="input-group-prepend">
		    		<span class="input-group-text"> <i class="fas fa-comment-alt"></i> </span>
		 		 </div>
                <textarea name="msg" id="msg" class="form-control" placeholder="Write here!"></textarea>
              </div>
            </div>
	        <div class="form-group-sm"  style="padding-top: 20px">
	          <button type="submit" class="btn btn-secondary btn-block"> Request call back</button>
	        </div> <!-- form-group// -->
	    </form>
        </article>
        </div>
       </div>
      </div>
     </div>
    </section>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
  <script src="./Dashboard/plugins/sweetalert2/sweetalert2.all.min.js"></script>
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
    $('#callback').on('submit', function(e) {
      e.preventDefault();
        loader();
        $.ajax({
            url: './Dashboard/backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
                type:"requestcallback",
                name:$('#name').val(),
                mail:$('#email').val(),
                mobile:$('#mobile').val(),
                course:$('#course').val(),
                msg:$('#msg').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  Swal.fire(
                  'Success',
                  'Call back request submitted successfully.',
                  'success'
                ).then(function(){
            window.location.href = "./index.php";
        });
            }
                else{
                  Swal.fire(
                  'Error',
                  'Something went wrong',
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