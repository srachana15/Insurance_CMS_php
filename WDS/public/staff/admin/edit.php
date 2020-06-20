<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admin/index.php'));
}

$id =$_GET['id'];



if(is_post_request()) {

  // Handle form values sent by new.php
  $admin= [];
  $admin['id'] = $_POST['id'] ?? '';
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['hashed_password'] = $_POST['hashed_password'] ?? '';
  $admin['confirmed_password'] = $_POST['confirmed_password'] ?? '';
  
  $result = update_admin($admin);

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'admin Information Edited!';
    redirect_to(url_for('/staff/admin/show.php?id=' . h(u($id))));
  } else {
  $errors = $result;
  }
} else {
  $admin = find_record("admins", "id" ,$id);
}

?>
<?php $page_title = 'Edit admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit admin</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/admin/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>id</dt>
        <dd><input type="number" name="id" value="<?php echo h($admin['id']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($admin['first_name']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($admin['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>email</dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']); ?>" /></dd>
      </dl>

      <dl>
        <dt>username</dt>
        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Password </dt>
        <dd><input type="password" name="hashed_password" value="" /></dd>
      </dl>

       <dl>
        <dt>Confirm Password </dt>
        <dd><input type="password" name="confirmed_password" value="" /></dd>
      </dl>
 
      <div id="operations">
        <input type="submit" value="Edit admin" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>


