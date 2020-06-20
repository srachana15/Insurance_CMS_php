<?php require_once('../../../private/initialize.php'); 

require_login();
?>



<?php $result_set = find_all("customer_login"); ?>

<?php $page_name='Customer_Login'; ?>
<?php $page_title='Customer_Login'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Customer_Login Listing"> 
		<h1>Customer_Login</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/customer_login/new.php'); ?>">Add Customer Login</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Cid</th>
        <th>username</th>
        
    
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($customer = mysqli_fetch_assoc($result_set)) { ?>
        <tr>
          <td><?php echo h($customer['Cid']); ?></td>
          <td><?php echo h($customer['username']); ?></td>
          
          <td><a class="action" href="<?php echo url_for('/staff/customer_login/show.php?id=' . h(u($customer['username']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer_login/edit.php?id=' . h(u($customer['username']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer_login/delete.php?id=' . h(u($customer['username']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php

    mysqli_free_result($result_set);

?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>