<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){
  $vehicle_driver=[];
  $vehicle_driver['Vin'] = $_POST['Vin'] ?? '';
  $vehicle_driver['License_no'] = $_POST['License_no'] ?? '';
  $vehicle_driver['Rating'] = $_POST['Rating'] ?? '';

  $result = insert_vehicle_driver($vehicle_driver);
  //for insert statement the result is True or False

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Rating Added!';
    redirect_to(url_for('/staff/vehicle_driver/show.php?id=' . h(u($vehicle_driver['Vin'])) . '&id2=' . h(u($vehicle_driver['License_no']))));

  } else {
    $errors = $result;
  }
} else {
$vehicle_driver['Vin'] = '';
$vehicle_driver['License_no'] = '';
$vehicle_driver['Rating'] = '';  
}

?>
<?php $page_title = 'Create Vehicle_Driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle_driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer new">
    <h1>Create Vehicle_Driver</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/vehicle_driver/new.php'); ?>" method="post">
     
     <dl>
        <dt>VIN</dt>
        <dd><input type="text" name="Vin" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($vehicle_driver['Vin']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($vehicle_driver['License_no']); ?>" /></dd>
      </dl>
      
     <dl>
        <dt>Rating</dt>
        <dd><input type="number" min="0" max="10" name="Rating" value="<?php echo h($vehicle_driver['Rating']); ?>" /></dd>
      </dl>
     
      <div id="operations">
        <input type="submit" value="Create Vehicle_Driver" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
