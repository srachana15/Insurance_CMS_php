<?php require_once('../../../private/initialize.php'); 

require_login();?>

<?php

$Payment_set = find_all("payment");

?>

<?php $page_name='Payment'; ?>
<?php $page_title='Payment'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Payment Listing"> 
		<h1>Payments</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/payment/new.php'); ?>">Create Payment Entry</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Instal_ID</th>
        <th>Instal_amt</th>
        <th>Pay_date</th>
  	    <th>Pay_method</th>
  	    <th>Invoice_id</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Payment = mysqli_fetch_assoc($Payment_set)) { ?>
        <tr>
          <td><?php echo h($Payment['Instal_ID']); ?></td>
          <td><?php echo h($Payment['Instal_amt']); ?></td>
          <td><?php echo h($Payment['Pay_date']); ?></td>
          <td><?php echo h($Payment['Pay_method']); ?></td>
          <td><?php echo h($Payment['Invoice_id']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/payment/show.php?id=' . h(u($Payment['Instal_ID']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/payment/edit.php?id=' . h(u($Payment['Instal_ID']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/payment/delete.php?id=' . h(u($Payment['Instal_ID']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
    <?php mysqli_free_result($Payment_set); ?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>