<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){

  $vehicle['Vin'] = $_POST['Vin'] ?? '';
  $vehicle['V_make'] = $_POST['V_make'] ?? '';
  $vehicle['V_model'] = $_POST['V_model'] ?? '';
  $vehicle['V_year'] = $_POST['V_year'] ?? '';
  $vehicle['V_status'] = $_POST['V_status'] ?? '';
  $vehicle['Policy_no'] = $_POST['Policy_no'] ?? '';
  
  $result = insert_vehicle($vehicle);
  //for insert statement the result is True or False

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Vehicle Added!';
    redirect_to(url_for('/staff/vehicle/show.php?id=' . h(u($vehicle['Vin']))));
  } else {
    $errors = $result;
  }
}
else{
$vehicle['Vin'] = '';
$vehicle['V_make'] = '';
$vehicle['V_model'] = '';
$vehicle['V_year'] = '';
$vehicle['V_status'] = '';
$vehicle['Policy_no'] = '';

  }


?>
<?php $page_title = 'Create Vehicle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle/index.php'); ?>">&laquo; Back to List</a>

  <div class="vehicle new">
    <h1>Create Vehicle</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/vehicle/new.php'); ?>" method="post">
      <dl>
        <dt>VIN</dt>
        <dd><input type="text" name="Vin" maxlength="10" 
         value="<?php echo h($vehicle['Vin']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Make</dt>
        <dd><input type="text" name="V_make" value="<?php echo h($vehicle['V_make']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Vehicle Model</dt>
        <dd><input type="text" name="V_model" value="<?php echo h($vehicle['V_model']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Vehicle Year</dt>
        <dd><input type="text" name="V_year" value="<?php echo h($vehicle['V_year']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Vehicle Status</dt>
          <dd><input type="radio" id = "L" name="V_status" value="L" <?php if($vehicle['V_status'] == "L") { echo "checked";} ?>
          />Leased</dd>
          <dd><input type="radio" id = "F" name="V_status" value="F" <?php if($vehicle['V_status'] == "F") { echo "checked";} ?>
          />Financed</dd>
          <dd><input type="radio" id = "O" name="V_status" value="O" <?php if($vehicle['V_status'] == "O") { echo "checked";} ?>
          />Owned</dd>      
      </dl>
      
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999"
        value="<?php echo h($vehicle['Policy_no']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Vehicle" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
