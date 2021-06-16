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
            <h1 class="m-0">New Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Registration</li>
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
                       <form id="register" method="POST">
            <div class="form-group-sm">
             <label> Student Name</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 </div>
                    <input class="form-control" placeholder="john deo" type="text" name="name" id="name" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
                    <input class="form-control" value="GPT" type="text" name="cname" id="cname" required hidden>
            <div class="form-group-sm">
             <label>Email-id</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input class="form-control" placeholder="example@gmail.com" type="email" name="email" id="email" required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Mobile No.</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class='fas fa-phone-alt'></i> </span>
                 </div>
                    <input name="mobile" class="form-control" type="tel" placeholder="012-345-6789" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" id="mobile" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Choose Sem</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-book"></i> </span>
                 </div>
                    <select name="course" id="course" class="form-control" required>
                        
                    </select>
            </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Enter Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="******" type="password" name="pass"  id="pass" required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Confirm Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="******" type="password" name="cpass" id="cpass"required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm" style="margin-top: 20px">
              <button type="submit" class="btn btn-warning btn-block"> Register</button>
            </div> <!-- form-group// -->
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
  $(document).ready( function () {
        $.ajax({
          "url": "./backend/data.php",
          "type": "POST",
          "dataType": "json",
          "data": {
            "type": "Getclass"
          },
          success : function(data) {
            var str = "<option value=''>---Select Sem---</option>";
            for(var i = 0; i < data.length; i++){
              str+= "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
            }

            $("#course").html(str);
          },
          error: function (response) {
            console.log("Error")
            console.log(response)
          }
        });
    });
    $('#register').on('submit', function(e) {
      e.preventDefault();
        loader();
        $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
                type:"register",
                name:$('#name').val(),
                cname:$('#cname').val(),
                mail:$('#email').val(),
                mobile:$('#mobile').val(),
                course:$('#course').val(),
                pass:$('#pass').val(),
                cpass:$('#cpass').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Registration done successful");
                    $("#register").trigger("reset");
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.error(data['message'], "something went wrong");
                    $("#register").trigger("reset");
                }
                if(data['success'] == 2){
                   // console.log('3')
                    // alert('warning');
                    toastr.warning(data['message'], "Insert correct data");
                    $("#register").trigger("reset");
                }
                if(data['success'] == 3){
                   // console.log('3')
                    // alert('warning');
                    toastr.warning(data['message'], "Email already exists");
                    $("#register").trigger("reset");
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
