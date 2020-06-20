<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){

  $customer = [];
  $customer['Cid'] = $_POST['Cid'] ?? '';
  $customer['Fname'] = $_POST['Fname'] ?? '';
  $customer['Lname'] = $_POST['Lname'] ?? '';
  $customer['St'] = $_POST['St'] ?? '';
  $customer['City'] = $_POST['City'] ?? '';
  $customer['State'] = $_POST['State'] ?? '';
  $customer['Zipcode'] = $_POST['Zipcode'] ?? '';
  $customer['Gender'] = $_POST['Gender'] ?? '';
  $customer['DOB'] = $_POST['DOB'] ?? '';
  $customer['M_Status'] = $_POST['M_Status'] ?? '';
  $customer['C_Type'] = $_POST['C_Type'] ?? '';
  //$Visible = $_POST['visible'] ?? '';

  $result = insert_customer($customer);

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Customer Added!';
    redirect_to(url_for('/staff/customer/show.php?id=' . h(u($customer['Cid']))));

  } else {
  $errors = $result;
  }
} else {
$customer['Cid'] = '';
$customer['Fname'] = '';
$customer['Lname'] = '';
$customer['St'] = '';
$customer['City'] = '';
$customer['State'] = '';
$customer['Zipcode'] = '';
$customer['Gender'] = '';
$customer['DOB'] = '';
$customer['M_Status'] = '';
$customer['C_Type'] = '';
  }

?>

<?php $page_title = 'Create Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer new">
    <h1>Create Customer</h1>
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/customer/new.php'); ?>" method="post">
      <dl>
        <dt>Cid</dt>
        <dd><input type="number" name="Cid" min ="1" max = "999999" value="<?php echo h($customer['Cid']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="Fname" style="text-transform:uppercase" value="<?php echo $customer['Fname']; ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="Lname" style="text-transform:uppercase" value="<?php echo h($customer['Lname']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Street Address</dt>
        <dd><input type="text" name="St" value="<?php echo h($customer['St']); ?>" /></dd>
      </dl>

      <dl>
        <dt>City</dt>
        <dd><input type="text" name="City" value="<?php echo h($customer['City']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>State </dt>
        <dd><input type="text" name="State" maxlength="2" style="text-transform:uppercase"
        value="<?php echo h($customer['State']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Zipcode</dt>
        <dd><input type="number" name="Zipcode" min="1" max="99999" value="<?php echo h($customer['Zipcode']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Gender</dt>
        <dd><input type="radio" id = "Male" name="Gender" value="M" <?php if($customer['Gender'] == "M") { echo "checked";} ?>
        /><label for="Male">Male</label></dd>
        <dd><input type="radio" id = "Female" name="Gender" value="F" <?php if($customer['Gender'] == "F") { echo "checked";} ?>
        /><label for="Female">Female</label></dd>
      </dl>

      <dl>
      	<dt>Date of Birth</dt>
      	<dd><input type ="date" name="DOB" value="<?php echo h($customer['DOB']); ?>"></dd>
      </dl>

      <dl>
        <dt>Marital Status</dt>
        <dd><input type="radio" id = "Single" name="M_Status" value="S" <?php if($customer['M_Status'] == "S") { echo "checked";} ?>
        /><label for="Single">Single</label></dd>
        <dd><input type="radio" id = "Married" name="M_Status" value="M" <?php if($customer['M_Status'] == "M") { echo "checked";} ?>
        /><label for="Married">Married</label></dd>
        <dd><input type="radio" id = "Widowed" name="M_Status" value="W" <?php if($customer['M_Status'] == "W") { echo "checked";} ?>
        /><label for="Widowed">Widowed</label></dd>
      </dl>

      <dl>
        <dt>Customer Type</dt>
        <dd><input type="radio" id = "Automobile" name="C_Type" value="A" <?php if($customer['C_Type'] == "A") { echo "checked";} ?>
        /><label for="Automobile">Automobile</label></dd>
        <dd><input type="radio" id = "Home" name="C_Type" value="H" <?php if($customer['C_Type'] == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
        <dd><input type="radio" id = "Both" name="C_Type" value="AH" <?php if($customer['C_Type'] == "AH") { echo "checked";} ?>
        /><label for="Both">Both</label></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Customer" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
