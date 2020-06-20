<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php

$Policy_set = find_all("policy");

?>

<?php $page_name='Policy'; ?>
<?php $page_title='Policy'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Policy Listing"> 
		<h1>Policies</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/policy/new.php'); ?>">Create Policy</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Policy_no</th>
        <th>P_Type</th>
        <th>Cid</th>
  	    <th>Start_Date</th>
  	    <th>End_Date</th>
  	    <th>Premium</th>
  	    <th>Status</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Policy = mysqli_fetch_assoc($Policy_set)) { ?>
        <tr>
          <td><?php echo h($Policy['Policy_no']); ?></td>
          <td><?php echo h($Policy['P_Type']); ?></td>
          <td><?php echo h($Policy['Cid']); ?></td>
          <td><?php echo h($Policy['Start_Date']); ?></td>
          <td><?php echo h($Policy['End_Date']); ?></td>
          <td><?php echo h($Policy['Premium']); ?></td>
          <td><?php echo h($Policy['Status']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/policy/show.php?id=' . h(u($Policy['Policy_no']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/policy/edit.php?id=' . h(u($Policy['Policy_no']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/policy/delete.php?id=' . h(u($Policy['Policy_no']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php mysqli_free_result($Policy_set); ?>
		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>