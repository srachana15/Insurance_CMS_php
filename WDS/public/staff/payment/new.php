<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){

  $payment['Instal_ID'] = $_POST['Instal_ID'] ?? '';
  $payment['Instal_amt'] = $_POST['Instal_amt'] ?? '';
  $payment['Pay_date'] = $_POST['Pay_date'] ?? '';
  $payment['Pay_method'] = $_POST['Pay_method'] ?? '';
  $payment['Invoice_id'] = $_POST['Invoice_id'] ?? '';
  

  $result = insert_payment($payment);
  //for insert statement the result is True or False

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Payment Recorded!';
    redirect_to(url_for('/staff/payment/show.php?id=' . h(u($payment['Instal_ID']))));
    
  } else {
    $errors = $result;
  }
}
else{
$payment['Instal_ID'] = '';
$payment['Instal_amt'] = '';
$payment['Pay_date'] = '';
$payment['Pay_method'] = '';
$payment['Invoice_id'] = '';
  }

?>
<?php $page_title = 'Create Payment'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/payment/index.php'); ?>">&laquo; Back to List</a>

  <div class="payment new">
    <h1>Create Payment</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/payment/new.php'); ?>" method="post">
      <dl>
        <dt>Instal_ID</dt>
        <dd><input type="number" name="Instal_ID" min ="10000000" max = "99999999" value="<?php echo h($payment['Instal_ID']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Installment Amount</dt>
        <dd><input type="number" name="Instal_amt" value="<?php echo h($payment['Instal_amt']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Payment Date</dt>
        <dd><input type="date" name="Pay_date" value="<?php echo h($payment['Pay_date']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Pay_method</dt>
        <dd><input type="radio" id = "Credit" name="Pay_method" value="CREDIT" <?php if($payment['Pay_method'] == "CREDIT") { echo "checked";} ?>
        /><label for="Credit">Credit</label></dd>
        <dd><input type="radio" id = "Debit" name="Pay_method" value="DEBIT" <?php if($payment['Pay_method'] == "DEBIT") { echo "checked";} ?>
        /><label for="Debit">Debit</label></dd>
        <dd><input type="radio" id = "Cheque" name="Pay_method" value="CHEQUE" <?php if($payment['Pay_method'] == "CHEQUE") { echo "checked";} ?>
        /><label for="Cheque">Cheque</label></dd>
        <dd><input type="radio" id = "Paypal" name="Pay_method" value="PAYPAL" <?php if($payment['Pay_method'] == "PAYPAL") { echo "checked";} ?>
        /><label for="PayPal">PayPal</label></dd>
      </dl>
      
      <dl>
        <dt>Invoice_id</dt>
        <dd><input type="number" name="Invoice_id" min ="1000000" max = "9999999" value="<?php echo h($payment['Invoice_id']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Payment" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
