<?php
  include('../dbConnection.php');
  $data = stripcslashes(file_get_contents("php://input"));
  $mydata = json_decode($data,true);
  $a_email = $mydata['aemail'];
  $sql = "SELECT a_name, a_email, a_phn FROM adminlogin_tb WHERE a_email='$a_email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
?>