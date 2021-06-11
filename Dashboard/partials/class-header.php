<?php
session_start();
include './../../connection.php';
if (isset($_SESSION['id'])) {
  $sid=$_SESSION['id'];
   $sql="SELECT * FROM `users` Where id='$sid'";
   $result1=mysqli_query($conn,$sql);
   $row3=mysqli_fetch_array($result1);
   $dirname=$_SERVER['PHP_SELF'];
   $dir=dirname($_SERVER['PHP_SELF']);
   $cid=$row3['course_id'];
   
}
else{
  header("Location: ./../../login.php");
}
$access=0;
if ($row3['user_role']!=1)
{
 // echo "hii";
 if ($dir=="/MdEduChem/Dashboard/11thclassroom") {
  // echo "hii";
  if ($cid==1 || $cid==3) {
    $access=1;
    // code...
  }
 }
 if ($dir=="/MdEduChem/Dashboard/12thclassroom") {
  // echo "hii";
  if ($cid==2 || $cid==3) {
    $access=1;
    // code...
  }
 }
}
else
  $access=1;

// echo $access;
 $restrict = '<html>
     <head><title>404 Not Found</title></head>
     <body bgcolor="white">
     <center><h1>404 Not Found</h1></center>
     <hr><center></center>
     </body>
     </html>';
if ($access==0)
  die($restrict);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MdEduChem | Dashboard</title>
  <link rel="shortcut icon" href="./../../images/logo.png" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          <!-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          <!-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          <!-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i><?php echo $row3['name']; ?>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
          <div class="dropdown-divider"></div>
          <a href="./../profile.php" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="./../../logout.php" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> LogOut
          </a>
          </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="./../../images/logo.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">MD EduChem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if($row3['user_role']==1 || $row3['course_id']!=2){?>
          <li class="nav-item">
            <a href="./11thclassroom/" class="nav-link bg-primary">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                11<sup>th</sup> Classroom
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./../11thclassroom/" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/index.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/syllabus.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/syllabus.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Syllabus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/textbooks.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/textbooks.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Textbook's</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/practical-books.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/practical-books.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Practical Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/reference-books.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/reference-books.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Reference Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/videos.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/videos.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Videos</p>
                </a>
              </li>
              <?php if($row3['user_role']==1){?>
              <li class="nav-item">
                <a href="./../11thclassroom/notes.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/notes.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Notes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/exercises.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/exercises.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Exercise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/examinations.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/examinations.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Examination</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../11thclassroom/cet.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/cet.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>CET</p>
                </a>
              </li>
              <?php }?>
              <li class="nav-item">
                <a href="./../11thclassroom/career-guidance.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/11thclassroom/career-guidance.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Carrer guidance</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } if($row3['user_role']==1 || $row3['course_id']!=1){?>
          <li class="nav-item">
            <a href="./12thclassroom/" class="nav-link bg-primary">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                12<sup>th</sup> Classroom
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./../12thclassroom/" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/index.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/syllabus.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/syllabus.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Syllabus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/textbooks.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/textbooks.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Textbook's</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/practical-books.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/practical-books.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Practical Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/reference-books.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/reference-books.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Reference Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/videos.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/videos.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Videos</p>
                </a>
              </li>
              <?php if($row3['user_role']==1){?>
              <li class="nav-item">
                <a href="./../12thclassroom/notes.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/notes.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Notes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/exercises.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/exercises.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Exercise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/examinations.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/examinations.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Examination</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./../12thclassroom/cet.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/cet.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>CET</p>
                </a>
              </li>
            <?php } ?>
              <li class="nav-item">
                <a href="./../12thclassroom/career-guidance.php" class="nav-link <?php if($dirname =="/MdEduChem/Dashboard/12thclassroom/career-guidance.php") { echo 'active'; } ?>">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Carrer guidance</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } if($row3['user_role']==1){?>
          <li class="nav-item">
            <a href="./../uploadfile.php" class="nav-link">
              <i class="fa fa-upload nav-icon"></i>
              <p>Upload Material</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./../uploadvideo.php" class="nav-link">
              <i class="fa fa-upload nav-icon"></i>
              <p>Upload Video</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./../post-notification.php" class="nav-link">
              <i class="fa fa-bell nav-icon"></i>
              <p>Post Notification</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./../all-material.php" class="nav-link">
              <i class="fa fa-book nav-icon"></i>
              <p>ALL Material</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./../students.php" class="nav-link">
              <i class="fa fa-user nav-icon"></i>
              <p>Students</p>
            </a>
          </li>
        <?php } ?>
        <li class="nav-item">
            <a href="./../feedback.php" class="nav-link">
              <i class="fa fa-comments nav-icon"></i>
              <p>Feedback</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>