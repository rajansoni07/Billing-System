<?php
  include('../dbConnection.php');
  $data = stripcslashes(file_get_contents("php://input"));
  $mydata = json_decode($data,true);
  $a_name = $mydata['aname'];
  $a_email = $mydata['aemail'];
  $a_phn = $mydata['aphn'];
  $sql = "UPDATE adminlogin_tb SET a_name='$a_name',a_phn='$a_phn' WHERE a_email='$a_email'";
  if($conn->query($sql) == TRUE){
    echo '<div class="alert alert-success mt-2">Updated Succesfully</div>';
  }else{
    echo '<div class="alert alert-danger mt-2">Unable to Update</div>';
  }
?>