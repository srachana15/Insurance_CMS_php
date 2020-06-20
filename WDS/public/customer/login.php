<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  //validations
  if(is_blank($username)){
    $errors[] = "username cannot be blank";
  }
   if(is_blank($password)){
    $errors[] = "password cannot be blank";
  }
  //if no error process form
  if(empty($errors)){
    $admin = find_customer_login($username);

    if($admin){

      if(password_verify($password, $admin['hashed_password'])){
        //password matches
          log_in_customer($admin);
          #$_SESSION['message'] = 'Login Succesful!';
          redirect_to(url_for('/customer/show.php?id=' . $admin['Cid']));
      }
      else{
        //username correct but password wrong
        $errors[]="Login Unsuccesful!";
      }

    }
    else{
      $errors[]= "Login Unsuccesful!";
    }
  }



}

?>

<?php $page_title = 'Customer Log In'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="content">
  <h1>Customer Login</h1>
  <h3>User: <?php echo $_SESSION['username'] ?? ''; ?></h3>
  <!--<h3>User Id: <?php echo $_SESSION['id'] ?? ''; ?></h3> -->

  <?php echo display_errors($errors); ?>


  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>


  <h4><a href="<?php echo url_for('/customer/logout.php'); ?>">Logout</a></h4><br>

</div>



<?php include(SHARED_PATH . '/public_footer.php'); ?>
