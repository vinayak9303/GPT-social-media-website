<?php
 include './partials/dash-header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Feedback</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Feedback</li>
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
                       <form id="postfb" method="POST">
                          <div class="form-group">
                            <input type="text" name="notification_text" id="ft" required class="form-control" placeholder="Enter feedback">
                          </div>
                          <div class="my-3">
                            <input type="submit" name="POST" class="btn btn-primary" value="Post">
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
    <?php if($row3['user_role']==1){ ?>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card col-md-12">
              <div class="card-header my-2" style="border-bottom: none;">
                <h3 class="card-title">
                  <i class="fas fa-bell "></i>
                  Feedback
                </h3>
              </div> <!-- /.card-header
              <div class="card-body">
                <div class="tab-content p-0">
                 Morris chart - Sales -->
                 <div class="table-responsive">
                    <table class="table display table-striped table-bordered nowrap text-center col-md-12" id="ft_table" style="width: 100%; ">
                      <thead>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>feedback</th>
                        <th>date</th>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>feedback</th>
                        <th>date</th>
                      </tfoot>
                    </table>
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
  <?php }?>
  </div>
  <!-- /.content-wrapper -->
<?php
 include './partials/dash-footer.php';
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
$(document).ready(function() {
    // $.fn.dataTable.moment( 'YYYY-MM-DD HH:mm:ss' );
    
    table = $('#ft_table').DataTable({
            "destroy": true,
            "order": [
                [1, "desc"]
            ],
            "language": {
                "thousands": "'",
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
                "url": "./backend/data.php",
                "type": "POST",
                "data": {
                    "type": "fetch_feedback",
            }
        },
        rowCallback: function (row,data) {
          console.log(data);
                      // if(admin == 1) {
            //     $('td:eq(5)',row).html('<a href="'+data[5]+'" target="_blank">'+data[5]+'</a>');
                // $('td:eq(3)',row).html(`<button class="btn btn-danger btn-sm" onClick=deleteNotification('${data[3]}')>Delete</button>`);
            // }
            // else {
            //     $('td:eq(4)',row).html('<a href="'+data[4]+'" target="_blank">'+data[4]+'</a>');
                // $('td:eq(6)',row).html(`<button class="btn btn-primary btn-sm resend" onClick=resendNotification('${data[1]}') ${data[6]=='paid'? 'disabled' : ''}>Resend</button>`);
            }
        // }
        
    });
  });
  $('#postfb').on('submit', function(e) {
        loader();
        
        $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
              type:"post_feedback",
              ft:$('#ft').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                    $("#postfb").trigger("reset");
                   table.ajax.reload();
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.success(data['message'], "something went wrong");
                    $("#postfb").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 2){
                   // console.log('3')
                    // alert('warning');
                    toastr.success(data['message'], "title should not be empty");
                    $("#postfb").trigger("reset");
                    table.ajax.reload();
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
