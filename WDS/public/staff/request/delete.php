<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/request/index.php'));
}

$id = $_GET['id'];

$request = find_record("request", "Request_time" ,$id);

if(is_post_request()) {
$result=delete_record("request", "Request_time" ,$id);
$_SESSION['message'] = 'request Data Deleted!';
redirect_to(url_for('/staff/request/index.php'));
}
else{
$request = find_record("request", "Request_time" ,$id);
}

?>

<?php $page_title = 'Delete request'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/request/index.php'); ?>">&laquo; Back to List</a>

  <div class="request delete">
    <h1>Delete request</h1>
    <p>Are you sure you want to delete this request?</p>
    <p class="item"><?php echo h($request['Request_time']); ?></p>
    <p class="item"><?php echo h($request['Fname']); ?></p>
    <p class="item"><?php echo h($request['Lname']); ?></p>

    <form action="<?php echo url_for('/staff/request/delete.php?id=' . h(u($request['Request_time']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete request" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
