<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php

$Invoice_set = find_all("invoice");

/*
  $Invoices = [
    ['Invoice_id' => '1001101', 'Invoice_amt' => '425', 'Policy_no' => '100000000101','Due_Date' => '03/28/2019'],
    ['Invoice_id' => '1001201', 'Invoice_amt' => '1000', 'Policy_no' => '100000000201','Due_Date' => '03/28/2019'],
  ];
  */
?>

<?php $page_name='Invoice'; ?>
<?php $page_title='Invoice'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Invoice Listing"> 
		<h1>Invoice List</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/invoice/new.php'); ?>">Create Invoice</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Invoice Id</th>
        <th>Invoice_amt</th>
        <th>Policy_no</th>
  	    <th>Due_Date</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while ($Invoice = mysqli_fetch_assoc($Invoice_set)) { ?>
        <tr>
          <td><?php echo h($Invoice['Invoice_id']); ?></td>
          <td><?php echo h($Invoice['Invoice_amt']); ?></td>
          <td><?php echo h($Invoice['Policy_no']); ?></td>
          <td><?php echo h($Invoice['Due_Date']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/invoice/show.php?id=' . h(u($Invoice['Invoice_id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/invoice/edit.php?id=' . h(u($Invoice['Invoice_id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/invoice/delete.php?id=' . h(u($Invoice['Invoice_id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php mysqli_free_result($Invoice_set); ?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>