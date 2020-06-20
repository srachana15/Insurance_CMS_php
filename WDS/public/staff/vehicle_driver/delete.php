<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/vehicle_driver/index.php'));
}

$id = $_GET['id'] ?? '1';
$id2=$_GET['id2'];


if(is_post_request()) {
$result=delete_vehicle_driver_record($id,$id2);
$_SESSION['message'] = 'Rating Deleted!';
redirect_to(url_for('/staff/vehicle_driver/index.php'));
}
else{
$vehicle_driver = find_vehicle_driver_record($id,$id2);
}

?>

<?php $page_title = 'Delete vehicle_driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle_driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="vehicle_driver delete">
    <h1>Delete vehicle_driver</h1>
    <p>Are you sure you want to delete this vehicle_driver?</p>
    <p class="item">VIN: <?php echo h($vehicle_driver['Vin']); ?></p>
    <p class="item">License Number: <?php echo h($vehicle_driver['License_no']); ?></p>
    <p class="item">Rating: <?php echo h($vehicle_driver['Rating']); ?></p> 

    <form action="<?php echo url_for('/staff/vehicle_driver/delete.php?id=' . $id . '&id2=' . $id2); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete vehicle_driver" />
      </div>
    </form>
  </div>

</div>