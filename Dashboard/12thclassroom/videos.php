<?php
include './../../connection.php';
 $id=2;
 $sql="SELECT * FROM `material` where class_id='$id' AND category_id='5'";
 $result=mysqli_query($conn,$sql);
include './../partials/class-header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">12<sup>th</sup> Video</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">12<sup>th</sup> Video</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div> --><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="row text-center">
                    <?php
                    foreach ($result as $key => $value) {
                      # code...
                      ?>
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-header border-0 py-0">
                          <img src="./../../<?php echo $value['thambnail_url'];?>" width="100%">
                        </div>
                        <div class="card-body border-0 py-0 " style="height: 30px;">
                          <?php 
                          if($value['material_title']) 
                          ?>
                           <h5><?php echo substr($value['material_title'], 0, 20);?>...</h5>
                        </div>
                        <div class="card-footer">
                          <a href="<?php echo $value['material_url'];?>" class="bnt btn-primary p-2 rounded-pill" target="_blank"><i class="fa fa-play" style="font-size:18px;color:white"></i>&nbsp Watch</a>
                        </div>
                      </div>
                    </div>
                    <?php
                     }
                    ?> 
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include './../partials/class-footer.php';
?>
