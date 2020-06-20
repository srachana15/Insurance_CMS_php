<?php

require_once('../../private/initialize.php');
customer_require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}

$id =$_GET['id'];



if(is_post_request()) {

  // Handle form values sent by new.php
  $admin = [];
  $admin['Cid'] = $_POST['Cid'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['hashed_password'] = $_POST['hashed_password'] ?? '';
  $admin['confirmed_password'] = $_POST['confirmed_password'] ?? '';
  
  $result = update_customer_login($admin);

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Customer Login Information Edited!';
    redirect_to(url_for('/customer/show.php?id=' . h(u($id))));
  } else {
  $errors = $result;
  }
} else {
  $admin = find_record("customer_login", "Cid" ,$id);
}

?>
<?php $page_title = 'Edit Customer Login'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/show.php?id=' . $admin['Cid']); ?>">&laquo; Back</a>

  <div class="admin edit">
    <h1>Edit admin</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/customer/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Cid</dt>
        <dd><input type="number" name="Cid" value="<?php echo h($admin['Cid']); ?>" /></dd>
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

<?php include(SHARED_PATH . '/public_footer.php'); ?>
