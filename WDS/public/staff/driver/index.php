<?php require_once('../../../private/initialize.php'); 

require_login();
?>


<?php
/*
  $Drivers = [
    ['License_no' => 'A456788148', 'D_Fname' => 'Yash', 'D_Lname' => 'Joshi',  'D_DOB' => '09/30/1995'],
    ['License_no' => 'A667888148', 'D_Fname' => 'Rachana', 'D_Lname' => 'Swamy',  'D_DOB' => '08/15/1995'],
  ];
  */
  $Driver_set = find_all("drivers");
?>

<?php $page_name='Drivers'; ?>
<?php $page_title='Drivers'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Driver Listing"> 
		<h1>Drivers</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/driver/new.php'); ?>">Create Driver</a>
	</div>

	<table class="list">
  	  <tr>
        <th>License_no</th>
        <th>D_Fname</th>
        <th>D_Lname</th>
  	    <th>D_DOB</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Driver = mysqli_fetch_assoc($Driver_set)) { ?>
        <tr>
          <td><?php echo h($Driver['License_no']); ?></td>
          <td><?php echo h($Driver['D_Fname']); ?></td>
          <td><?php echo h($Driver['D_Lname']); ?></td>
          <td><?php echo h($Driver['D_DOB']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/driver/show.php?id=' . h(u($Driver['License_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/driver/edit.php?id=' . h(u($Driver['License_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/driver/delete.php?id=' . h(u($Driver['License_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php mysqli_free_result($Driver_set); ?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>