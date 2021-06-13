<?php
  define('MAINTITLE', 'Manage Products');
  session_start();
  include('../dbConnection.php');
  include('includes/adminheader.php');
?>
<!-- main div already started -->
<h3 class="text-center p-3 mb-3">Manage Products</h3>
<div class="row">
  <!--------------------------- add or edit product form------------------->
  <div class="col-sm-5">
    <p class=" bg-dark text-white p-2 text-center">Add / Edit Product</p>
    <form action="" method="post" id="myform">
    <div class="form-group">
      <input type="text" class="form-control d-none" name="p_id" id="pid">
      <label class="font-weight-bold" for="name">Product Name :</label>
      <input type="text" class="form-control" name="p_name" id="p_name_id">
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <label class="font-weight-bold" for="price">Price :</label>
        <input type="text" class="form-control" maxlength="6" name="p_price" id="p_price_id" onkeypress="isInputNumber(event)">
      </div>
      <div class="col-sm-6">
        <label class="font-weight-bold" for="quant">Add Quantity :</label>
        <input type="number" class="form-control" name="p_quant" id="p_quant_id" min="1" max="999">
      </div>
      </form>
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary px-5 mb-4" id="btnsave">Save</button>
    </div>
    <div id="msg"></div>
  </div>
  <!------------------------------- Display products--------------------------->
  <div class="col-sm-7">
    <p class=" bg-dark text-white p-2 text-center">List of Products</p>
    <table class="table table-hover">
      <thead>
      <tr>
        <th scope="col" class="th-sm">Product ID</th>
        <th scope="col" class="th-sm">Product Name</th>
        <th scope="col" class="th-sm">Price</th>
        <th scope="col" class="th-sm">Available</th>
        <th scope="col" class="th-sm">Action</th>
      </tr>
      </thead>
      <tbody id="tbody"></tbody>
  </div>
</div>

<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>

<!-- main div ended here -->
<?php
  include('includes/adminfooter.php');
?>