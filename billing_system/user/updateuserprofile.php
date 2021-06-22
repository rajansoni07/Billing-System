<?php
  include('../dbConnection.php');
  $data = stripcslashes(file_get_contents("php://input"));
  $mydata = json_decode($data,true);
  $u_name = $mydata['uname'];
  $u_email = $mydata['uemail'];
  $u_phn = $mydata['uphn'];
  $sql = "UPDATE usersignup_tb SET u_name='$u_name',u_phn='$u_phn' WHERE u_email='$u_email'";
  if($conn->query($sql) == TRUE){
    echo '<div class="alert alert-success mt-2">Updated Succesfully</div>';
  }else{
    echo '<div class="alert alert-danger mt-2">Unable to Update</div>';
  }
?>