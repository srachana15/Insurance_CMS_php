
<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php 
  $id = $_GET['id'] ?? '1';
  $id2=$_GET['id2'];

  $vehicle_driver = find_vehicle_driver_record($id,$id2);

?>

<?php $page_title = 'Show vehicle_driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/vehicle_driver/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="vehicle_driver show">
    
        <h2> Vehicle Number: <?php echo h($vehicle_driver['Vin']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>License Number:</dt>
        		<dd> <?php echo h($vehicle_driver['License_no']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Driver Date:</dt>
        		<dd> <?php echo h($vehicle_driver['Rating']); ?> </dd>
        	</dl>
        	        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

