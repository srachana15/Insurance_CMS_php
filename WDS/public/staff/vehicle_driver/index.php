<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php
  $Vehicle_Driver_set = find_all("vehicle_driver");
?>

<?php $page_name='Vehicle_Driver'; ?>
<?php $page_title='Vehicle_Driver'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Vehicle_Driver Listing"> 
		<h1>Vehicle-Driver</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/vehicle_driver/new.php'); ?>">Create Vehicle_Driver</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Vin</th>
        <th>License_no</th>
        <th>Rating</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Vehicle_Driver = mysqli_fetch_assoc($Vehicle_Driver_set)) { ?>
        <tr>
          <td><?php echo $Vehicle_Driver['Vin']; ?></td>
          <td><?php echo $Vehicle_Driver['License_no']; ?></td>
          <td><?php echo $Vehicle_Driver['Rating']; ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/vehicle_driver/show.php?id=' . h(u($Vehicle_Driver['Vin'])) . '&id2=' . h(u($Vehicle_Driver['License_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/vehicle_driver/edit.php?id=' . h(u($Vehicle_Driver['Vin'])) . '&id2=' . h(u($Vehicle_Driver['License_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/vehicle_driver/delete.php?id=' . h(u($Vehicle_Driver['Vin'])) . '&id2=' . h(u($Vehicle_Driver['License_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php mysqli_free_result($Vehicle_Driver_set); ?>
		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>