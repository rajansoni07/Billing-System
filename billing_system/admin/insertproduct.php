<?php
  include('../dbConnection.php');
  // read data
  $data = stripcslashes(file_get_contents("php://input"));
  // decode jsondata, get assoc array = true
  $mydata = json_decode($data,true);
  $p_id = $mydata['pid'];
  $p_name = $mydata['pname'];
  $p_price = $mydata['pprice'];
  $p_avail = $mydata['pquant'];

  // if(!empty($p_name) && !empty($p_price) && !empty($p_avail)){
  //   $sql = "INSERT INTO products_tb(p_name,p_price,p_avail) VALUES('$p_name','$p_price','$p_avail')";
  //   if($conn->query($sql) == true){
  //     echo 'Product Saved Successfully.';
  //   } else{
  //     echo 'Unable to Save.';
  //   }
  // }else{
  //   echo 'All Fields are Required.';
  // }

  if(!empty($p_name) && !empty($p_price) && !empty($p_avail)){
    $sql = "INSERT INTO products_tb(p_id, p_name, p_price, p_avail) VALUES('$p_id','$p_name','$p_price','$p_avail')
    ON DUPLICATE KEY UPDATE p_name = '$p_name',p_price = '$p_price',p_avail = '$p_avail' ";
    if($conn->query($sql) == true){
      echo 'Product Saved Successfully.';
    } else{
      echo 'Unable to Save.';
    }
  }else{
    echo 'All Fields are Required.';
  }
?>