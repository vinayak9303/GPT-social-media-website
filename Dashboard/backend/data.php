<?php
// header('Access-Control-Allow-Origin: *');
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
  $co = dirname(getcwd(), 2);
  include $co . '\connection.php';
  session_start();
  
  $type = $_POST['type'];

if ($type == "Getclass") {
    $sql ="SELECT * FROM  class";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      foreach ($result as $key => $value) {

        $data[] = ["id" => $value['id'], "name" => $value['name']];
      }
    }
    else
    {
    die;
    }  
}
else if ($type == "Getcategory") {
    $sql ="SELECT * FROM category";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      foreach ($result as $key => $value) {

        $data[] = ["id" => $value['id'], "name" => $value['name']];
      }
    }
    else
    {
    die;
    }  
}
else if ($type == "Getsubject") {
    $sql ="SELECT * FROM subjects";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      foreach ($result as $key => $value) {

        $data[] = ["id" => $value['id'], "name" => $value['name']];
      }
    }
    else
    {
    die;
    }  
}
elseif ($type == "uploadmaterial") {
    $class = $_POST['selectclass'];
    $category = $_POST['selectcategory'];
    $subject=$_POST['selectsubject'];
    $material_title=$_POST['material_title'];
    //$bill=$_POST['bill'];
    //$file=$_POST['file'];
    $year = date("Y");   
    $month = date("F"); 
    $cdir=getcwd();
    $filename = "./"."../../material/".$year;   
    $filename2 = "./"."../../material/".$year."/".$month;
    $filename3 = "./"."../../material/".$year."/".$month."/";
    $filename4="./../image/thambnail/".$year;
    $filename5="./../image/thambnail/".$year."/".$month;
    $filename6="./../image/thambnail/".$year."/".$month."/";
    if(is_dir($filename)){
      //$data = array("success" => 1);
    if(is_dir($filename2)){
      // $data = array("success" => 1);
    }
    else{
       mkdir($filename2,0777);
       // $data = array("success" => 1);
    }
}else{
    mkdir($filename,0777);
    // $data = array("success" => 1);
}
if(is_dir($filename4)){
      //$data = array("success" => 1);
    if(is_dir($filename5)){
      // $data = array("success" => 1);
    }
    else{
       mkdir($filename5,0777);
       // $data = array("success" => 1);
    }
}else{
    mkdir($filename4,0777);
    // $data = array("success" => 1);
}

 $tmp_name    = $_FILES['file']['tmp_name'][0];// get the temporary file name of the file on the server
 $tmp_name1    = $_FILES['file']['tmp_name'][1];
 $file_name   = $_FILES['file']['name'][0];
 $file_name1   = $_FILES['file']['name'][1];
 $tmp_name = $_FILES['file']['tmp_name'][0];
 $tmp_name1 = $_FILES['file']['tmp_name'][1];
 $file_name=$category.date('Ymhis').".pdf";
 $extension = pathinfo($_FILES["file"]["name"][1], PATHINFO_EXTENSION);
 $file_name1=$category.date('Ymhis').".".$extension;
$filename="material/".$year."/".$month."/".$file_name;
$filename1="Dashboard/image/thambnail/".$year."/".$month."/".$file_name1;
 if($_FILES['file']['type'][0] == "application/pdf")
 {
 

if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif')
{
  if (move_uploaded_file($tmp_name1, $filename6.$file_name1))
   {
  
   if (move_uploaded_file($tmp_name, $filename3.$file_name))
   {
     $date=date('Y-m-d');
     $sql="INSERT INTO `material`(`class_id`, `category_id`, `subject_id`, `material_title`, `thambnail_url`, `material_url`) VALUES ('$class','$category','$subject','$material_title','$filename1','$filename')";
    $result = mysqli_query($conn,$sql);
    if($result){
      $data = array("success" => 1);

      }
    else{
            $data = array("success" => 0);
      }
      $data = array("success" => 1);
    }
   else{
   $data = array("success" => 0);
   }
  }
  else{
   $data = array("success" => 0);
   }
}
  else{
    $data = array("success" => 3);
  }
}
else{
  $data = array("success" => 2);
}
}
elseif ($type == "uploadvideo") {
    $class = $_POST['selectclass'];
    $category = 5;
    $subject=$_POST['selectsubject'];
    $material_title=$_POST['material_title'];
    $video_link=$_POST['video_url'];
    //$bill=$_POST['bill'];
    //$file=$_POST['file'];
    $year = date("Y");   
    $month = date("F"); 
    $cdir=getcwd();
    $filename4="./../image/thambnail/video/".$year;
    $filename5="./../image/thambnail/video/".$year."/".$month."/";
    $filename6="./../image/thambnail/video/".$year."/".$month."/";
if(is_dir($filename4)){
      //$data = array("success" => 1);
    if(is_dir($filename5)){
      // $data = array("success" => 1);
    }
    else{
       mkdir($filename5,0777);
       // $data = array("success" => 1);
    }
}else{
    mkdir($filename4,0777);
    mkdir($filename5,0777);
    // $data = array("success" => 1);
}

 $tmp_name1    = $_FILES['file']['tmp_name'];
 $file_name1   = $_FILES['file']['name'];
 $tmp_name1 = $_FILES['file']['tmp_name'];
 $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
 $file_name1=$category.date('Ymhis').".".$extension;
$filename1="Dashboard/image/thambnail/video/".$year."/".$month."/".$file_name1;
 
 

if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif')
{
  if (move_uploaded_file($tmp_name1, $filename6.$file_name1))
   {
  
     $date=date('Y-m-d');
     $sql="INSERT INTO `material`(`class_id`, `category_id`, `subject_id`, `material_title`, `thambnail_url`, `material_url`) VALUES ('$class','$category','$subject','$material_title','$filename1','$video_link')";
    $result = mysqli_query($conn,$sql);
    if($result){
      $data = array("success" => 1);

      }
    else{
            $data = array("success" => 0);
      }
      $data = array("success" => 1);
    }
   else{
   $data = array("success" => 0);
   }
}
  else{
    $data = array("success" => 3);
  }
}
else if ($type == "register") {
    $name=$_POST['name'];
    $cname=$_POST['cname'];
    $email=$_POST['mail'];
    $mobile=$_POST['mobile'];
    $course=$_POST['course'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $date=date("Y-m-d H:i:s");
    if($pass==$cpass){
      $npass=md5($pass);
      if(!empty($name) && !empty($cname) && !empty($email) && !empty($mobile) && !empty($course)){
        $checkemail="SELECT * FROM `users` Where email='$email'";
        $result=mysqli_query($conn,$checkemail);
        if(mysqli_num_rows($result)>0){
          $data= array("success" => 3);
        }
        else{
          $insertsql="INSERT INTO `users`(`name`, `email`, `college name`, `mobile`, `course_id`, `password`, `date`) VALUES ('$name','$email','$cname','$mobile','$course','$npass','$date')";
          if(mysqli_query($conn,$insertsql)){
            try {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Host = "smtp.gmail.com";
            $mail->Username="gpthane97@gmail.com";
            $mail->Password="Gpt@1234";
            //Set who the message is to be sent from
            $mail->From = "gpthane97@gmail.com";
            //From email address and name
            $mail->FromName = "GPT";
            //Set who the message is to be sent to
            $mail->addAddress($email);
            //Send HTML or Plain Text email
            $mail->isHTML(true);
            //Set the subject line
            $mail->Subject = "Regitration successful";
            $mail->Body = "<p><b>Your Regitration is succesfully Done.</b><br>Your login credentials are as follows:<br><br>email:$email<br>password:$pass<br> you can login to Dashboard by going on our website.<br><br>Thank you.<br>Regards,<br>Admission Team | GPT</p>";
            $mail->AltBody = "This is the plain text version of the email content";
            
                $mail->send();
                $data= array("success" => 1);
            } catch (Exception $e) {
                $data= array("success" => 0);
            }
            //$data= array("success" => 1);
          }
          else{
            $data= array("success" => 0);
          }
        }
      }
      else
        $data = array("success" => 2);
    }
    else
      $data = array("success" => 4);
}
else if ($type == "requestcallback") {
    $name=$_POST['name'];
    $email=$_POST['mail'];
    $mobile=$_POST['mobile'];
    $course=$_POST['course'];
    $msg=$_POST['msg'];
    try {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username="gpthane97@gmail.com";
    $mail->Password="Gpt@1234";
    //Set who the message is to be sent from
    $mail->From = "gpthane97@gmail.com";
    //From email address and name
    $mail->FromName = "GPT";
    //Set who the message is to be sent to
    $mail->addAddress($email);
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    //Set the subject line
    $mail->Subject = "Call back Request Submitted succesfully";
    $mail->Body = "<p><b>Your Call back request is submitted succesfully.</b></p><p>You have submitted following details:<br>Name:$name<br>Email:$email<br>Mobile:$mobile<br>Course:$course<br>Massege:$msg<br><br> Our expert team contact with you within next 24 hours<br><br>Thank You.<br>Regards,<br> Academics Team | GPT</p>";
    $mail->AltBody = "This is the plain text version of the email content";
    
        if($mail->send()){
          $data= array("success" => 1);
        }
    } catch (Exception $e) {
        $data= array("success" => 0);
    }
    //$data= array("success" => 1);
}
else if ($type == "contact") {
    $name=$_POST['name'];
    $email=$_POST['mail'];
    $mobile=$_POST['mobile'];
    $msg=$_POST['massege'];
    $subject=$_POST['subject'];
    try {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username="gpthane97@gmail.com";
    $mail->Password="Gpt@1234";
    //Set who the message is to be sent from
    $mail->From = "gpthane97@gmail.com";
    //From email address and name
    $mail->FromName = "GPT";
    //Set who the message is to be sent to
    $mail->addAddress($email);
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    //Set the subject line
    $mail->Subject = "Query Submitted succesfully";
    $mail->Body = "<p><b>Your Query is submitted succesfully.</b></p><p>You have submitted following details:<br>Name:$name<br>Email:$email<br>Mobile:$mobile<br>subject:$subject<br>Massege:$msg<br><br> we will try to resolve your query within next 24 hours<br><br>Thank You.<br>Regards,<br> Academics Team | GPT</p>";
    $mail->AltBody = "This is the plain text version of the email content";
    
        if($mail->send()){
          $data= array("success" => 1);
        }
    } catch (Exception $e) {
        $data= array("success" => 0);
    }
    //$data= array("success" => 1);
}
else if ($type == "login") {
    $email=$_POST['mail'];
    $pass=$_POST['pass'];
      if(!empty($email) && !empty($pass)){
        $npass=md5($pass);
        $sql="SELECT * FROM `users` Where email='$email' AND password='$npass'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          $row=mysqli_fetch_array($result);
          if($row['status']==0)
            $data= array("success" => 3);
          else{
          $_SESSION['id'] = $row['id'];
          $data= array("success" => 1);
        }
        }
        else{
          $data= array("success" => 0);
        }
      }
    else
      $data = array("success" => 2);
}
else if ($type == "post_notification") {
    $nt=$_POST['nt'];
    $date=date("Y-m-d H:i:s");
      if(!empty($nt)) {
        $sql="INSERT INTO `notifiacation`(`title`, `date`) VALUES ('$nt','$date')";
        if(mysqli_query($conn,$sql)){
          $data= array("success" => 1);
        }
        else{
          $data= array("success" => 0);
        }
      }
    else
      $data = array("success" => 2);
}
else if ($type == "fetch_notification") {
  $sql="SELECT * FROM `notifiacation`";
  $result=mysqli_query($conn,$sql);
    $i=1;
    while($value= mysqli_fetch_assoc($result)) {
       // $data['data'][] = ["id" =>$i,"title" => $value['title'],"date" => $value['date'],"uid"=>$value['id']];
      $data['data'][] = array($i,$value['title'],$value['date'],$value['id']);
       $i=$i+1;
    }
}
else if ($type == "delete_notification") {
    $nid=$_POST['nid'];
    $sql ="DELETE FROM `notifiacation` Where id='$nid'";
    if(mysqli_query($conn,$sql))
    {
      $data= array("success" => 1);
        }
        else{
          $data= array("success" => 0);
        } 
}
else if ($type == "fetch_material") {
  $sql="SELECT c.name AS class,s.name AS subject,ca.name AS category,m.material_title,m.thambnail_url,m.material_url,m.id from material AS m INNER JOIN class AS c ON c.id=m.class_id INNER JOIN subjects AS s ON s.id=m.subject_id INNER JOIN category AS ca ON ca.id=m.category_id";
  $result=mysqli_query($conn,$sql);
    $i=1;
    while($value= mysqli_fetch_assoc($result)) {
       // $data['data'][] = ["id" =>$i,"title" => $value['title'],"date" => $value['date'],"uid"=>$value['id']];
      $data['data'][] = array($i,$value['class'],$value['subject'],$value['category'],$value['material_title'],$value['thambnail_url'],$value['material_url'],$value['id']);
       $i=$i+1;
    }
}
else if ($type == "delete_material") {
    $id=$_POST['id'];
    $thambnail=$_POST['thambnail'];
    $material=$_POST['material'];
    $thambnail_url="./../../".$thambnail;
    $material_url="./../../".$material;
    if(file_exists($thambnail_url))
    {
      if(file_exists($material_url))
      {
        unlink($thambnail_url);        
        unlink($material_url);
        $sql="DELETE FROM `material` Where id='$id'";
        if(mysqli_query($conn,$sql)){
          $data= array("success" => 1);
        }
        else
          $data= array("success" => 0);
      }
      else{
        unlink($thambnail_url);
        $sql="DELETE FROM `material` Where id='$id'";
        if(mysqli_query($conn,$sql)){
          $data= array("success" => 1);
        }
        else
          $data= array("success" => 0);
      }
    }
    else{
          $data= array("success" => 2);
    }
}
elseif ($type == "editmaterial") {
    $class = $_POST['class'];
    $category = $_POST['category'];
    $subject=$_POST['subject'];
    $material_title=$_POST['material_title'];
    $id=$_POST['id'];
    $sql="UPDATE `material` SET `class_id`='$class',`subject_id`='$subject',`category_id`='$category',`material_title`='$material_title' WHERE id='$id'";
    if(mysqli_query($conn,$sql))
      $data= array("success" => 1);
    else
      $data= array("success" => 0);
}
else if ($type == "fetch_students") {
  $sql="SELECT u.*,c.name AS class FROM `users` AS u INNER JOIN `class` AS c ON c.id=u.course_id";
  $result=mysqli_query($conn,$sql);
  // $row=mysqli_num_rows($result);
    $i=1;
    while($value= mysqli_fetch_assoc($result)) {
      $data['data'][] = array($i,$value['name'],$value['email'],$value['mobile'],$value['college name'],$value['class'],$value['status'],$value['id']);
      // if($row==$i)
      // {
      //   echo json_encode($data);
      //   exit();
      // }
       $i=$i+1;
    }
}
elseif ($type == "change_status") {
    $uid = $_POST['uid'];
    $status = $_POST['status'];
    $sql="UPDATE `users` SET `status`='$status' WHERE id='$uid'";
    if(mysqli_query($conn,$sql))
      $data= array("success" => 1);
    else
      $data= array("success" => 0);
}
else if ($type == "post_feedback") {
    $ft=$_POST['ft'];
    $date=date("Y-m-d H:i:s");
    $uid=$_SESSION['id'];
      if(!empty($ft)) {
        $sql="INSERT INTO `feedback`(`user_id`, `description`, `date`) VALUES ('$uid','$ft','$date')";
        if(mysqli_query($conn,$sql)){
          $data= array("success" => 1);
        }
        else{
          $data= array("success" => 0);
        }
      }
    else
      $data = array("success" => 2);
}
else if ($type == "fetch_feedback") {
  $sql="SELECT f.*,u.name,u.course_id FROM `feedback` AS f INNER JOIN `users` AS u ON u.id=f.user_id";
  $result=mysqli_query($conn,$sql);
    $i=1;
    while($value= mysqli_fetch_assoc($result)) {
       // $data['data'][] = ["id" =>$i,"title" => $value['title'],"date" => $value['date'],"uid"=>$value['id']];
      $sql1="SELECT * FROM `class` Where id=".$value['course_id'];
      $result1=mysqli_query($conn,$sql1);
      $row=mysqli_fetch_array($result1);
      $data['data'][] = array($i,$value['name'],$row['name'],$value['description'],$value['date']);
      $i=$i+1;
    }
}
elseif ($type == "updateprofile") {
    $name = $_POST['name'];
    $college = $_POST['college'];
    $mobile=$_POST['mobile'];
    $uid=$_SESSION['id'];
    $sql="UPDATE `users` SET `name`='$name',`mobile`='$mobile',`college name`='$college' WHERE id='$uid'";
    if(mysqli_query($conn,$sql))
      $data= array("success" => 1);
    else
      $data= array("success" => 0);
}
elseif ($type == "changepass") {
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $uid=$_SESSION['id'];
    if ($pass==$cpass)
    {
      $npass=md5($pass);
      $sql="UPDATE `users` SET `password`='$npass' WHERE id='$uid'";
      if(mysqli_query($conn,$sql))
        $data= array("success" => 1);
      else
        $data= array("success" => 0);
    }
    else{
      $data= array("success" => 2); 
    }
}

function sendregistrationMail($email)
{

}
  echo json_encode($data);
?>