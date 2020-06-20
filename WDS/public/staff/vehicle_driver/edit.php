<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/vehicle_driver/index.php'));
}

$id =$_GET['id'];
$id2=$_GET['id2'];


if(is_post_request()) {

   // Handle form values sent by new.php
  $vehicle_driver = [];
  $vehicle_driver['Vin'] = $_POST['Vin'] ?? '';
  $vehicle_driver['License_no'] = $_POST['License_no'] ?? '';
  $vehicle_driver['Rating'] = $_POST['Rating'] ?? '';


  $update = update_vehicle_driver($vehicle_driver);
  //for insert statement the vehicle_driver is True or False

  if($update===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Rating Edited!';
    redirect_to(url_for('/staff/vehicle_driver/show.php?id=' . h(u($id)) . '&id2=' . h(u($id2))));

  } else {
    $errors =  $update;
  }


}
else{
  $vehicle_driver= find_vehicle_driver_record($id,$id2);
}

?>
<?php $page_title = 'Edit Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle_driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer edit">
    <h1>Edit Customer</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/vehicle_driver/edit.php?id=' . h(u($id)) . '&id2=' . h(u($id2))); ?>" method="post">
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
        <input type="submit" value="Edit Vehicle-Driver" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


