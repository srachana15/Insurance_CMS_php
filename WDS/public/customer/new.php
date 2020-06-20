<?php

require_once('../../private/initialize.php');

if(is_post_request()){

  $request = [];
  $request['Fname'] = $_POST['Fname'] ?? '';
  $request['Lname'] = $_POST['Lname'] ?? '';
  $request['Email'] = $_POST['Email'] ?? '';
  $request['St'] = $_POST['St'] ?? '';
  $request['City'] = $_POST['City'] ?? '';
  $request['State'] = $_POST['State'] ?? '';
  $request['Zipcode'] = $_POST['Zipcode'] ?? '';
  $request['Gender'] = $_POST['Gender'] ?? '';
  $request['DOB'] = $_POST['DOB'] ?? '';
  $request['M_Status'] = $_POST['M_Status'] ?? '';
  $request['Itype'] = $_POST['Itype'] ?? '';
  //$Visible = $_POST['visible'] ?? '';

  $result = insert_request($request);

  if($result===true){
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/customer/thank_you.php?id=' . h(u($request['Fname'])) .'&id2=' . h(u($request['Itype']))));

  } else {
  $errors = $result;
  }
} else {
$request['Fname'] = '';
$request['Lname'] = '';
$request['Email'] = '';
$request['St'] = '';
$request['City'] = '';
$request['State'] = '';
$request['Zipcode'] = '';
$request['Gender'] = '';
$request['DOB'] = '';
$request['M_Status'] = '';
$request['Itype'] = '';
  }

?>
<?php $page_title = 'Welcome to WDS'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="content2">

  <a class="back-link" href="<?php echo url_for('/customer/index.php'); ?>">&laquo; Back</a>

  <div class="request edit">
    <h1>Enter Details</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/customer/new.php'); ?>" method="post">

      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="Fname" value="" /></dd>
      </dl>

      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="Lname" value="" /></dd>
      </dl>

      <dl>
        <dt>Email Address</dt>
        <dd><input type="text" name="Email" value="" /></dd>
      </dl>

      <dl>
        <dt>Street Address</dt>
        <dd><input type="text" name="St" value="" /></dd>
      </dl>

      <dl>
        <dt>City</dt>
        <dd><input type="text" name="City" value="" /></dd>
      </dl>

      <dl>
        <dt>State </dt>
        <dd><input type="text" name="State" value="" /></dd>
      </dl>

      <dl>
        <dt>Zipcode</dt>
        <dd><input type="number" name="Zipcode" min="1" max="99999" value="" /></dd>
      </dl>

      <dl>
        <dt>Gender</dt>
        <dd><input type="radio" id = "Male" name="Gender" value="M" /><label for="Male">Male</label></dd>
        <dd><input type="radio" id = "Female" name="Gender" value="F" /><label for="Female">Female</label></dd>
      </dl>

      <dl>
        <dt>Date of Birth</dt>
        <dd><input type ="date" name="DOB" value=""></dd>
      </dl>

      <dl>
        <dt>Marital Status</dt>
        <dd><input type="radio" id = "Single" name="M_Status" value="S" /><label for="Single">Single</label></dd>
        <dd><input type="radio" id = "Married" name="M_Status" value="M" /><label for="Married">Married</label></dd>
        <dd><input type="radio" id = "Widowed" name="M_Status" value="W" /><label for="Widowed">Widowed</label></dd>
      </dl>

      <dl>
        <dt>Insurance Type?</dt>
        <dd><input type="radio" id = "Auto" name="Itype" value="A" /><label for="Auto">Auto</label></dd>
        <dd><input type="radio" id = "Home" name="Itype" value="H" /><label for="Home">Home</label></dd>
        <dd><input type="radio" id = "Home" name="Itype" value="B" /><label for="Home">Both</label></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Submit" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
