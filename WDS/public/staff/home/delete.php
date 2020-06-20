<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/home/index.php'));
}

$id = $_GET['id'];

$home = find_record("home", "Home_id" ,$id);

if(is_post_request()) {
$result=delete_record("home", "Home_id" ,$id);
$_SESSION['message'] = 'Home Info Deleted!';
redirect_to(url_for('/staff/home/index.php'));
}
else{
$home = find_record("home", "Home_id" ,$id);
}

?>

<?php $page_title = 'Delete home'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/home/index.php'); ?>">&laquo; Back to List</a>

  <div class="home delete">
    <h1>Delete home</h1>
    <p>Are you sure you want to delete this home?</p>
    <p class="item"><?php echo h($home['Home_id']); ?></p>
    <p class="item"><?php echo h($home['Policy_no']); ?></p>
    <!--<p class="item"><?php echo h($home['Lname']); ?></p> -->

    <form action="<?php echo url_for('/staff/home/delete.php?id=' . h(u($home['Home_id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete home" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
