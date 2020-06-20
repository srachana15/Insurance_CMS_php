<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admin/index.php'));
}

$id = $_GET['id'];


#$admin = find_record("admins", "id" ,$id);



if(is_post_request()) {
$result=delete_record("admins", "id" ,$id);
$_SESSION['message'] = 'admin Data Deleted!';
redirect_to(url_for('/staff/admin/index.php'));
}
else{

$admin = find_record("admins", "id" ,$id);
}

?>

<?php $page_title = 'Delete admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin delete">
    <h1>Delete admin</h1>
    <p>Are you sure you want to delete this admin?</p>
    <p class="item"><?php echo h($admin['id']); ?></p>
    <p class="item"><?php echo h($admin['first_name']); ?></p>
    <p class="item"><?php echo h($admin['last_name']); ?></p>
    <p class="item"><?php echo h($admin['username']); ?></p>

    <form action="<?php echo url_for('/staff/admin/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete admin" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
