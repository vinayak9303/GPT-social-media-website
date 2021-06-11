<?php
session_start();
$pages = array(
    'index.php' => 'Home',
    'about.php' => 'About',
    'course.php' => 'Courses',
    'teacher.php' => 'Teachers',
    'event.php' => 'Events',
    'contact.php' => 'Contact',
) ;

$currentPage = basename($_SERVER['REQUEST_URI']) ;

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title> GPT | <?php foreach($pages as $filename => $pageTitle) {
      if ($filename == $currentPage)   
      echo htmlspecialchars($pageTitle);
      }
      ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" style="width: 40px;height: 40px" alt=""></img> G P Thane</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="course.php" class="nav-link">Courses</a></li>
          <li class="nav-item"><a href="teacher.php" class="nav-link">Teacher</a></li>
          <li class="nav-item"><a href="event.php" class="nav-link">Events</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>-->
          
          <?php foreach ($pages as $filename => $pageTitle) {
                if ($filename == $currentPage) { ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $filename ; ?>"><?php echo $pageTitle ; ?></a>
            </li>
            <?php } else {?>
            <li class="nav-item">
                 <a href="<?php echo $filename ; ?>" class="nav-link" ><?php echo $pageTitle ; ?></a>
            </li>
            <?php }
            }?>
            <li class="nav-item cta"><a href="login.php" class="nav-link"><span>Log In</span></a></li> 
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
  
  <div class="py-1" style="background-color: rgb(108 117 125 / 7%);">
    <marquee style="color: red;"><img src="images/new.gif" alt="new-gif" style="height: 20px">Welcome to GPT Thane
      <!-- <?php echo $marquee; ?> -->
    </marquee>
  </div>