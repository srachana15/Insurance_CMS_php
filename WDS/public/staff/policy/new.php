<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){

  $policy = [];
  $policy['Policy_no'] = $_POST['Policy_no'] ?? '';
  $policy['P_Type'] = $_POST['P_Type'] ?? '';
  $policy['Cid'] = $_POST['Cid'] ?? '';
  $policy['Start_Date'] = $_POST['Start_Date'] ?? '';
  $policy['End_Date'] = $_POST['End_Date'] ?? '';
  $policy['Premium'] = $_POST['Premium'] ?? '';
  $policy['Status'] = $_POST['Status'] ?? '';

  $result = insert_policy($policy);
  //for insert statement the result is True or False

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Policy Added!';
    redirect_to(url_for('/staff/policy/show.php?id=' . h(u($policy['Policy_no']))));

  } else {
    $errors = $result;
  }
}
else{
$policy['Policy_no'] = '';
$policy['P_Type'] = '';
$policy['Cid'] = '';
$policy['Start_Date'] = '';
$policy['End_Date'] = '';
$policy['Premium'] = '';
$policy['Status'] = '';

  }

?>
<?php $page_title = 'Create Policy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/policy/index.php'); ?>">&laquo; Back to List</a>

  <div class="policy new">
    <h1>Create Policy</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/policy/new.php'); ?>" method="post">
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999"
        value="<?php echo h($policy['Policy_no']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Policy Type</dt>
        <dd><input type="radio" id = "Auto" name="P_Type" value="A" <?php if($policy['P_Type'] == "A") { echo "checked";} ?>
        /><label for="Auto">Auto</label></dd>
        <dd><input type="radio" id = "Home" name="P_Type" value="H" <?php if($policy['P_Type'] == "H") { echo "checked";} ?>
        /><label for="Home">Home</label></dd>
      </dl>
      
      <dl>
        <dt>Customer ID</dt>
        <dd><input type="number" name="Cid" min="100000" max="999999" value="<?php echo h($policy['Cid']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Start Date</dt>
        <dd><input type="date" name="Start_Date" value="<?php echo h($policy['Start_Date']); ?>" /></dd>
      </dl>

      <dl>
        <dt>End Date</dt>
        <dd><input type="date" name="End_Date" value="<?php echo h($policy['End_Date']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Premium</dt>
        <dd><input type="number" name="Premium" value="<?php echo h($policy['Premium']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Status</dt>
        <dd><input type="radio" id = "Current" name="Status" value="C" <?php if($policy['Status'] == "C") { echo "checked";} ?>
        /><label for="Current">Current</label></dd>
        <dd><input type="radio" id = "Expired" name="Status" value="P" <?php if($policy['Status'] == "P") { echo "checked";} ?>
        /><label for="Expired">Expired</label></dd>        
      </dl>
  
      <div id="operations">
        <input type="submit" value="Create Policy" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
