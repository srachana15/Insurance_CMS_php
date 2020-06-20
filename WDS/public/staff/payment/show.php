
<?php require_once('../../../private/initialize.php'); 

require_login();?>

<?php 
  $id = $_GET['id'] ?? '1';
  $payment = find_record("payment", "Instal_ID" ,$id);
?>

<?php $page_title = 'Show Payment'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/payment/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="payment show">
    
        <h2> Payment Number: <?php echo h($payment['Instal_ID']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>Installment Amount:</dt>
        		<dd> <?php echo h($payment['Instal_amt']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Payment Date:</dt>
        		<dd> <?php echo h($payment['Pay_date']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Payment Method:</dt>
        		<dd> <?php echo h($payment['Pay_method']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Invoice ID:</dt>
        		<dd> <?php echo h($payment['Invoice_id']); ?> </dd>
        	</dl>
        	
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

