<?php
include './header.php';
?> 
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
            <h1 class="mb-3 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <!-- <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span>  Phadke Rd, opp. Bharat Gears Ltd, Phadkepada, Mumbra, Thane, Maharashtra 400612</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel:99696 01972">+91 99696 01972</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:gpthane97@gmail.com">gpthane97@gmail.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website:</span> <a href="https://gpthane.in/" target="_blank">gpthane.in</a></p>
          </div>
        </div> -->
        <div class="row block-9">
          <div class="col-lg-6 pr-md-5">
          	<h4 class="mb-4">Do you have any questions?</h4>
            <form id="contact" method="POST">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Your Mobile No" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"  required>
              </div>
              <div class="form-group">
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" required>
              </div>
              <div class="form-group">
                <textarea name="massege" id="massege" cols="30" rows="7" class="form-control" placeholder="Enter Message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
          <div class="col-lg-6 d-table-cell mb-5 contact-info">
          <div class="mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="">
            <p><span style="color:black"><i class="fa fa-home"></i> :</span>  Phadke Rd, opp. Bharat Gears Ltd, Phadkepada, Mumbra,<br> Thane, Maharashtra 400612</p>
          </div>
          <div class="">
            <p><span style="color:black"><i class="fa fa-phone"></i> :</span> <a href="tel:99696 01972">+91 99696 01972</a></p>
          </div>
          <div class="">
            <p><span style="color:black"><i class="fa fa-envelope-o"></i> :</span> <a href="mailto:gpthane97@gmail.com">gpthane97@gmail.com</a></p>
          </div>
          <div class="">
            <p><span style="color:black"><i class="fa fa-globe" aria-hidden="true"></i> :</span> <a href="https://gpthane.in/" target="_blank">gpthane.in</a></p>
          </div>
        
          
          <div class="google-maps" style="width:100%;height:280px;padding-top: 10px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15075.403790867058!2d73.0435256!3d19.1580007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa28af202166f2da4!2sGovernment%20Polytechnic%20Thane!5e0!3m2!1sen!2sin!4v1621621462453!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </section>

<?php
include './footer.php';
?> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
  <script src="./Dashboard/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
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
$('#contact').on('submit', function(e) {
      e.preventDefault();
        loader();
        $.ajax({
            url: './Dashboard/backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
                type:"contact",
                name:$('#name').val(),
                mail:$('#email').val(),
                mobile:$('#mobile').val(),
                massege:$('#massege').val(),
                subject:$('#subject').val(),
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  Swal.fire(
                  'Success',
                  'Query submitted successfully',
                  'success'
                ).then(function(){
            location.reload();
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