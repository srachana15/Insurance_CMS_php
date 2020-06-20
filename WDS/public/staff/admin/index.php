<?php require_once('../../../private/initialize.php'); 

require_login();
?>



<?php $Admin_set = find_all("admins"); ?>

<?php $page_name='Admins'; ?>
<?php $page_title='Admins'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Admins Listing"> 
		<h1>Admins</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/admin/new.php'); ?>">Add Admin</a>
	</div>

	<table class="list">
  	  <tr>
        <th>id</th>
        <th>Fname</th>
        <th>Lname</th>
  	    <th>email</th>
  	    <th>username</th>
  	    
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Admin = mysqli_fetch_assoc($Admin_set)) { ?>
        <tr>
          <td><?php echo h($Admin['id']); ?></td>
          <td><?php echo h($Admin['first_name']); ?></td>
          <td><?php echo h($Admin['last_name']); ?></td>
          <td><?php echo h($Admin['email']); ?></td>
          <td><?php echo h($Admin['username']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/Admin/show.php?id=' . h(u($Admin['id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/Admin/edit.php?id=' . h(u($Admin['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/Admin/delete.php?id=' . h(u($Admin['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php

    mysqli_free_result($Admin_set);

?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>