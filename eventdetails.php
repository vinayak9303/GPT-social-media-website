<?php
include './header.php';
?> 
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Event</span></p>
            <h1 class="mb-3 bread">Events</h1>
          </div>
        </div>
      </div>
    </div>

<div>  
<?php
$id=$_GET['id'];
if($id==1){
?>
  <section class="ftco-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12" >
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/event-1.jpg');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.php"><i class="ion-ios-arrow-back"></i>Go to the previous page</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
}
?>
</div>

<div>  
<?php
$id=$_GET['id'];
if($id==2){
?>
  <section class="ftco-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/event-2.jpg');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.php"><i class="ion-ios-arrow-back"></i>Go to the previous page</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
}
?>
</div>

<div>  
<?php
$id=$_GET['id'];
if($id==3){
?>
  <section class="ftco-section">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.php" class="block-20" style="background-image: url('images/event-3.jpg');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div><a href="#">Sep. 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mb-4"><a href="#">Intern Bootcamp Meetup 2018</a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p><a href="event.php"><i class="ion-ios-arrow-back"></i>Go to the previous page</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
}
?>
</div>

<?php
include './footer.php';
?> 