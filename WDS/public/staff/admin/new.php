<?php

require_once('../../../private/initialize.php');
require_login();

if(is_post_request()){

  $admin = [];
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['hashed_password'] = $_POST['hashed_password'] ?? '';
  $admin['confirmed_password'] = $_POST['confirmed_password'] ?? '';

  $result = insert_admin($admin);

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New admin Added!';
    redirect_to(url_for('/staff/admin/show.php?id=' . $new_id));

  } else {
  $errors = $result;
  }
} else {
$admin['first_name'] = '';
$admin['last_name'] = '';
$admin['email'] = '';
$admin['username'] = '';
$admin['hashed_password'] = '';

  }

?>

<?php $page_title = 'Create admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Create admin</h1>
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/admin/new.php'); ?>" method="post">
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name"  value="<?php echo $admin['first_name']; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name"  value="<?php echo h($admin['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
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
      Password should be atleast 8 letters with atleast One Uppercase letter, One Lowercase letter, a number and a symbol.
 
      <div id="operations">
        <input type="submit" value="Create admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
