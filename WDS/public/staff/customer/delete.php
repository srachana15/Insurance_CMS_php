<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/customer/index.php'));
}

$id = $_GET['id'];

$customer = find_record("customer", "Cid" ,$id);

if(is_post_request()) {
$result=delete_record("customer", "Cid" ,$id);
$_SESSION['message'] = 'Customer Data Deleted!';
redirect_to(url_for('/staff/customer/index.php'));
}
else{
$customer = find_record("customer", "Cid" ,$id);
}

?>

<?php $page_title = 'Delete Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="Customer delete">
    <h1>Delete Customer</h1>
    <p>Are you sure you want to delete this Customer?</p>
    <p class="item"><?php echo h($customer['Cid']); ?></p>
    <p class="item"><?php echo h($customer['Fname']); ?></p>
    <p class="item"><?php echo h($customer['Lname']); ?></p>

    <form action="<?php echo url_for('/staff/customer/delete.php?id=' . h(u($customer['Cid']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Customer" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
