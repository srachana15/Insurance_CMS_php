<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/driver/index.php'));
}

$id = $_GET['id'];



if(is_post_request()) {
$result=delete_record("drivers", "License_no" ,$id);
$_SESSION['message'] = 'Driver Deleted!';
redirect_to(url_for('/staff/driver/index.php'));
}
else{
$driver = find_record("drivers", "License_no" ,$id);
}

?>

<?php $page_title = 'Delete driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="driver delete">
    <h1>Delete driver</h1>
    <p>Are you sure you want to delete this driver?</p>
    <p class="item"><?php echo h($driver['License_no']); ?></p>
    <p class="item"><?php echo h($driver['D_Fname']); ?></p>
    <p class="item"><?php echo h($driver['D_Lname']); ?></p>

    <form action="<?php echo url_for('/staff/driver/delete.php?id=' . h(u($driver['License_no']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete driver" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
