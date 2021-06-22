<?php
  include('../dbConnection.php');
  $data = stripcslashes(file_get_contents("php://input"));
  $mydata = json_decode($data,true);
  $u_email = $mydata['uemail'];
  $sql = "SELECT u_name, u_email, u_phn FROM usersignup_tb WHERE u_email='$u_email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
?>