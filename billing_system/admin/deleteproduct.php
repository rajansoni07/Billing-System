<?php
  include('../dbConnection.php');
  $data = stripcslashes(file_get_contents("php://input"));
  $mydata = json_decode($data,true);
  $p_id = $mydata['pid'];

  if(!empty($p_id)){
    $sql = "DELETE FROM products_tb WHERE p_id = {$p_id}";
    if($conn->query($sql) == true){
      echo 1;
    } else{
      echo 0;
    }
  }
?>