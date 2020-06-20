<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/policy/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
$result=delete_record("policy", "Policy_no" ,$id);
$_SESSION['message'] = 'Policy Info Deleted!';
redirect_to(url_for('/staff/policy/index.php'));
}
else{
$policy = find_record("policy", "Policy_no" ,$id);
}

?>

<?php $page_title = 'Delete policy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/policy/index.php'); ?>">&laquo; Back to List</a>

  <div class="policy delete">
    <h1>Delete policy</h1>
    <p>Are you sure you want to delete this policy?</p>
    <p class="item"><?php echo h($policy['Policy_no']); ?></p>
    <p class="item"><?php echo h($policy['P_Type']); ?></p>
    <p class="item"><?php echo h($policy['Cid']); ?></p>

    <form action="<?php echo url_for('/staff/policy/delete.php?id=' . h(u($policy['Policy_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete policy" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
