<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){
  $driver = [];
  $driver['License_no']= $_POST['License_no'] ?? '';
  $driver['D_Fname'] = $_POST['D_Fname'] ?? '';
  $driver['D_Lname'] = $_POST['D_Lname'] ?? '';
  $driver['D_DOB']= $_POST['D_DOB'] ?? '';
  
  $result = insert_driver($driver);

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Driver Added!';
    redirect_to(url_for('/staff/driver/show.php?id=' . h(u($driver['License_no']))));

  } else {
  $errors = $result;
  }
} else {
$driver['License_no'] = '';
$driver['D_Fname'] = '';
$driver['D_Lname'] = '';
$driver['D_DOB'] = '';
}

?>

<?php $page_title = 'Create Driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/driver/index.php'); ?>">&laquo; Back to List</a>

  <div class="driver new">
    <h1>Create Driver</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/driver/new.php'); ?>" method="post">
      <dl>
        <dt>License no</dt>
        <dd><input type="text" name="License_no" maxlength="10" style="text-transform:uppercase"
         value="<?php echo h($driver['License_no']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="D_Fname" value="<?php echo h($driver['D_Fname']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="D_Lname" value="<?php echo h($driver['D_Lname']); ?>" /></dd>
      </dl>
      
      <dl>
      	<dt>Driver's Date of Birth</dt>
      	<dd><input type ="date" name="D_DOB" value="<?php echo h($driver['D_DOB']); ?>"></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Driver" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
