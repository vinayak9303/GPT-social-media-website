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
            <h1 class="m-0">All Material</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Material</li>
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
                    <table class="table display table-striped table-bordered nowrap text-center col-md-12" id="mt_table" style="width: 100%; ">
                      <thead>
                        <th>Sr.No</th>
                        <th>class</th>
                        <th>subject</th>
                        <th>category</th>
                        <th>Material Title</th>
                        <th>Thambnail</th>
                        <th>Material</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <th>Sr.No</th>
                        <th>class</th>
                        <th>subject</th>
                        <th>category</th>
                        <th>Material Title</th>
                        <th>Thambnail</th>
                        <th>Material</th>
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
function deleteMaterial(thambnail,material,id){
  console.log(id);
  console.log(material);
  console.log(thambnail);
  Swal.fire({
  title: 'Do you want to delete this Material?',
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
              type:"delete_material",
              id:id,
              thambnail:thambnail,
              material:material
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
function editmaterial(id){
  console.log(id);
  url="./edit-material.php?id="+id;
  console.log(url);
  window.location.href=url;
}
$(document).ready(function() {
    // $.fn.dataTable.moment( 'YYYY-MM-DD HH:mm:ss' );
    
    table = $('#mt_table').DataTable({
            "destroy": true,
            "scrollX": true,
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
                    "type": "fetch_material",
            }
        },
        rowCallback: function (row,data) {
          console.log(data);
                      // if(admin == 1) {
                $('td:eq(5)',row).html('<a href="./../'+data[5]+'" target="_blank">'+data[5]+'</a>');
                $('td:eq(6)',row).html('<a href="./../'+data[6]+'" target="_blank">'+data[6]+'</a>');
                // $('td:eq(5)',row).html('<a href="'+${data[5]}+'" target="_blank" >'+data[5]+'</a>');
                // $('td:eq(7)',row).html(`<button class="btn btn-primary btn-sm mx-1" onClick=deleteNotification('${data[7]}')>Edit</button><button class="btn btn-danger btn-sm" onClick=deleteNotification('${data[7]}')>Delete</button>`);
                $('td:eq(7)',row).html(`<button class="btn btn-primary btn-sm mx-1" onClick=editmaterial('${data[7]}')>Edit</button><button class="btn btn-danger btn-sm" onClick=deleteMaterial(\'${data[5]}','${data[6]}','${data[7]}\')>Delete</button>`);
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
