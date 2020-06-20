<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/vehicle/index.php'));
}

$id = $_GET['id'];

$vehicle = find_record("vehicle", "Vin" ,$id);

if(is_post_request()) {
$result=delete_record("vehicle", "Vin" ,$id);
$_SESSION['message'] = 'Vehicle Info Deletd';
redirect_to(url_for('/staff/vehicle/index.php'));
}
else{
$vehicle = find_record("vehicle", "Vin" ,$id);
}

?>

<?php $page_title = 'Delete vehicle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/vehicle/index.php'); ?>">&laquo; Back to List</a>

  <div class="vehicle delete">
    <h1>Delete vehicle</h1>
    <p>Are you sure you want to delete this vehicle?</p>
    <p class="item">VIN<?php echo h($vehicle['Vin']); ?></p>
    <p class="item">Policy Number<?php echo h($vehicle['Policy_no']); ?></p>
    <p class="item">V_status<?php echo h($vehicle['V_status']); ?></p> 

    <form action="<?php echo url_for('/staff/vehicle/delete.php?id=' . h(u($vehicle['Vin']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete vehicle" />
      </div>
    </form>
  </div>

</div>