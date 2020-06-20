<?php require_once('../../../private/initialize.php'); 



require_login();
?>

<?php 
$Vehicle_set = find_all("vehicle");
?>

<?php $page_name='Vehicle'; ?>
<?php $page_title='Vehicle'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Vehicle Listing"> 
		<h1>Vehicles</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/vehicle/new.php'); ?>">Create Vehicle</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Vin</th>
        <th>V_make</th>
        <th>V_model</th>
  	    <th>V_year</th>
  	    <th>V_status</th>
  	    <th>Policy_no</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Vehicle = mysqli_fetch_assoc($Vehicle_set)){ ?>
        <tr>
          <td><?php echo h($Vehicle['Vin']); ?></td>
          <td><?php echo h($Vehicle['V_make']); ?></td>
          <td><?php echo h($Vehicle['V_model']); ?></td>
          <td><?php echo h($Vehicle['V_year']); ?></td>
          <td><?php echo h($Vehicle['V_status']); ?></td>
          <td><?php echo h($Vehicle['Policy_no']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/vehicle/show.php?id=' . h(u($Vehicle['Vin']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/vehicle/edit.php?id=' . h(u($Vehicle['Vin']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/vehicle/delete.php?id=' . h(u($Vehicle['Vin']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php mysqli_free_result($Vehicle_set); ?>
		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>