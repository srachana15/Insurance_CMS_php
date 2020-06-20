<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/invoice/index.php'));
}

$id = $_GET['id'];

$invoice = find_record("invoice", "Invoice_id" ,$id);

if(is_post_request()) {
$result=delete_record("invoice", "Invoice_id" ,$id);
$_SESSION['message'] = 'Invoice Info Deleted!';
redirect_to(url_for('/staff/invoice/index.php'));
}
else{
$invoice = find_record("invoice", "Invoice_id" ,$id);
}

?>

<?php $page_title = 'Delete invoice'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/invoice/index.php'); ?>">&laquo; Back to List</a>

  <div class="invoice delete">
    <h1>Delete invoice</h1>
    <p>Are you sure you want to delete this invoice?</p>
    <p class="item"><?php echo h($invoice['Invoice_id']); ?></p>
    <p class="item"><?php echo h($invoice['Policy_no']); ?></p>
    <p class="item"><?php echo h($invoice['Invoice_amt']); ?></p> 

    <form action="<?php echo url_for('/staff/invoice/delete.php?id=' . h(u($invoice['Invoice_id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete invoice" />
      </div>
    </form>
  </div>

</div>
