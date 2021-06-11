<?php
 include './partials/dash-header.php';
 $eid=$_GET['id'];
 $sqlmaterial="SELECT * FROM `material` Where id='$eid'";
 $resultmaterial=mysqli_query($conn,$sqlmaterial);
 $material=mysqli_fetch_array($resultmaterial);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Material</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Material</li>
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
                  <div class="row">
                    <div class="col-md-6 container-fluid">
                       <form id="editmaterial" method="POST">
                          <div class="my-3">
                            <select class="form-control" id="selectclass" name="selectclass" required>
                              <option>--- Select Class ---</option>
                            </select>
                          </div>
                          <div class="my-3">
                            <select class="form-control" id="selectcategory" name="selectcategory" required>
                              <option>--- Select Category ---</option>
                            </select>
                          </div>
                          <div class="my-3">
                            <select class="form-control" id="selectsubject" name="selectsubject" required>
                              <option>--- Select Subject ---</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" name="material_title" id="material_title" required class="form-control" placeholder="Enter file title" value="<?php echo $material['material_title']?>">
                          </div>
                          <input type="text" name="id" id="id" value="<?php echo $eid?>" hidden>
                          <div class="my-3">
                            <input type="submit" name="Upload" class="btn btn-primary" value="Upload">
                          </div>
                        </form>

                      </div>
                  </div>
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
include './partials/dash-footer.php'
  ?>
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
  $(document).ready( function () {
    $.ajax({
      "url": "./backend/data.php",
      "type": "POST",
      "dataType": "json",
      "data": {
        "type": "Getclass"
      },
      success : function(data) {
        var str = "<option value=''>---Select Class---</option>";
        for(var i = 0; i < data.length; i++){
          str+= "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
        }

        $("#selectclass").html(str);
      },
      error: function (response) {
        console.log("Error")
        console.log(response)
      }
    });
    $.ajax({
      "url": "./backend/data.php",
      "type": "POST",
      "dataType": "json",
      "data": {
        "type": "Getcategory"
      },
      success : function(data) {
        var str = "<option value=''>---Select Category---</option>";
        for(var i = 0; i < data.length; i++){
          str+= "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
        }

        $("#selectcategory").html(str);
      },
      error: function (response) {
        console.log("Error")
        console.log(response)
      }
    });
    $.ajax({
      "url": "./backend/data.php",
      "type": "POST",
      "dataType": "json",
      "data": {
        "type": "Getsubject"
      },
      success : function(data) {
        var str = "<option value=''>---Select Subject---</option>";
        for(var i = 0; i < data.length; i++){
          str+= "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
        }

        $("#selectsubject").html(str);
      },
      error: function (response) {
        console.log("Error")
        console.log(response)
      }
    });
  } );
  $('#editmaterial').on('submit', function(e) {
        loader();
        $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
            	type:"editmaterial",
            	id:$('#id').val(),
            	class:$('#selectclass').val(),
            	subject:$('#selectsubject').val(),
            	category:$('#selectcategory').val(),
            	material_title:$('#material_title').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    // alert('success');
                    toastr.success(data['message'], "Success");
                    window.location.href="./all-material.php";
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.error(data['message'], "something went wrong");
                    // window.location.href="./all-material.php";
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
