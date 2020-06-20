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
    $admin = find_admin($username);

    if($admin){
      
      if(password_verify($password, $admin['hashed_password'])){
        //password matches
          log_in_admin($admin);
          #$_SESSION['message'] = 'Login Succesful!';
           redirect_to(url_for('/staff/index.php'));
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

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>
  <?php echo display_errors($errors); ?>
  

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
