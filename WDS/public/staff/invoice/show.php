
<?php require_once('../../../private/initialize.php'); 

require_login();?>

<?php 
  $id = $_GET['id'] ?? '1';
  $invoice = find_record("invoice", "Invoice_id" ,$id);
?>

<?php $page_title = 'Show Invoice'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/invoice/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="invoice show">
    
        <h2> Invoice Id: <?php echo h($invoice['Invoice_id']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>Invoice Amount:</dt>
        		<dd> <?php echo h($invoice['Invoice_amt']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Number:</dt>
        		<dd> <?php echo h($invoice['Policy_no']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Due Date:</dt>
        		<dd> <?php echo h($invoice['Due_Date']); ?> </dd>
        	</dl>
        </div>
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

