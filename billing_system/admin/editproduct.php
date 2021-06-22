<?php
  include('../dbConnection.php');
  $data = stripcslashes(file_get_contents("php://input"));
  $mydata = json_decode($data,true);
  $p_id = $mydata['pid'];
  $sql = "SELECT * FROM products_tb WHERE p_id = {$p_id}";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
?>