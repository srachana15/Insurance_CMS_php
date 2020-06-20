<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/payment/index.php'));
}

$id = $_GET['id'];

$payment = find_record("payment", "Instal_ID" ,$id);

if(is_post_request()) {
$result=delete_record("payment", "Instal_ID" ,$id);
$_SESSION['message'] = 'Payment Info Deleted !';
redirect_to(url_for('/staff/payment/index.php'));
}
else{
$payment = find_record("payment", "Instal_ID" ,$id);
}

?>

<?php $page_title = 'Delete payment'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/payment/index.php'); ?>">&laquo; Back to List</a>

  <div class="payment delete">
    <h1>Delete payment</h1>
    <p>Are you sure you want to delete this payment?</p>
    <p class="item">Installment ID<?php echo h($payment['Instal_ID']); ?></p>
    <p class="item">Install Amount<?php echo h($payment['Instal_amt']); ?></p>
    <p class="item">Invoice ID<?php echo h($payment['Invoice_id']); ?></p> 

    <form action="<?php echo url_for('/staff/payment/delete.php?id=' . h(u($payment['Instal_ID']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete payment" />
      </div>
    </form>
  </div>

</div>