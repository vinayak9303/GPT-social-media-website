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
            <h1 class="m-0">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
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
              <!-- <div class="card-header my-2" style="border-bottom: none;">
                <h3 class="card-title">
                  <i class="fas fa-bell "></i>
                  Notifications
                </h3>
              </div> --> <!-- /.card-header
              <div class="card-body">
                <div class="tab-content p-0">
                 Morris chart - Sales -->
                 <div class="table-responsive">
                    <table class="table display table-striped table-bordered nowrap text-center col-md-12" id="st_table" style="width: 100%; ">
                      <thead>
                        <th>Sr.No</th>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>college</th>
                        <th>class</th>
                        <th>status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <th>Sr.No</th>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>college</th>
                        <th>class</th>
                        <th>status</th>
                        <th>Action</th>
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
function Changestatus(status,uid){
  if(status==1)
    status=0;
  else
    status=1;
  Swal.fire({
  title: 'Do you want to change user status?',
  text: "",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
              type:"change_status",
              uid:uid,
              status:status
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                    // $("#postnt").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.error(data['message'], "something went wrong");
                    // $("#postnt").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 2){
                  // console.log('3')
                    // alert('failure');
                    toastr.warning(data['message'], "thambnail not exists");
                    // $("#postnt").trigger("reset");
                    table.ajax.reload();
                }
            },
             error: function (response) {
        console.log("Error")
        console.log(response)
      }
        });    
        
        return false;
      }
    });
}
$(document).ready(function() {
    // $.fn.dataTable.moment( 'YYYY-MM-DD HH:mm:ss' );
    
    table = $('#st_table').DataTable({
            "destroy": true,
            "scrollX": true,
            "order": [
                [1, "asc"]
            ],
            "language": {
                "thousands": "'",
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
                "url": "./backend/data.php",
                "type": "POST",
                "data": {
                    "type": "fetch_students",
            }
        },
        rowCallback: function (row,data) {
          console.log(data);
                      // if(admin == 1) {
                // $('td:eq(5)',row).html('<a href="./../'+data[5]+'" target="_blank">'+data[5]+'</a>');
                if(data['6']==1)
                $('td:eq(6)',row).html('<span class="badge badge-pill badge-success">Active</span>');
                else
                  $('td:eq(6)',row).html('<span class="badge badge-pill badge-danger">Blocked</span>');
                // $('td:eq(5)',row).html('<a href="'+${data[5]}+'" target="_blank" >'+data[5]+'</a>');
                // $('td:eq(7)',row).html(`<button class="btn btn-primary btn-sm mx-1" onClick=deleteNotification('${data[7]}')>Edit</button><button class="btn btn-danger btn-sm" onClick=deleteNotification('${data[7]}')>Delete</button>`);
                $('td:eq(7)',row).html(`<button class="btn btn-primary btn-sm mx-1" onClick=Changestatus(\'${data[6]}','${data[7]}\')>Change status</button>`);
            // }
            // else {
            //     $('td:eq(4)',row).html('<a href="'+data[4]+'" target="_blank">'+data[4]+'</a>');
                // $('td:eq(6)',row).html(`<button class="btn btn-primary btn-sm resend" onClick=resendNotification('${data[1]}') ${data[6]=='paid'? 'disabled' : ''}>Resend</button>`);
            }
        // }
        
    });

  });
  
</script>
</body>
</html>
