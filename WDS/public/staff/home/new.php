<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()){

  $home = [];
  $home['Home_id'] = $_POST['Home_id'] ?? '';
  $home['Purchase_Date'] = $_POST['Purchase_Date'] ?? '';
  $home['Home_value'] = $_POST['Home_value'] ?? '';
  $home['Area'] = $_POST['Area'] ?? '';
  $home['Home_type'] = $_POST['Home_type'] ?? '';
  $home['Auto_fire'] = $_POST['Auto_fire'] ?? '';
  $home['Home_sec'] = $_POST['Home_sec'] ?? '';
  $home['Pool'] = $_POST['Pool'] ?? '';
  $home['Basement'] = $_POST['Basement'] ?? '';
  $home['Policy_no'] = $_POST['Policy_no'] ?? '';
  

  $result = insert_home($home);
  //for insert statement the result is True or False

  if($result===true){
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'New Home Added!';
    redirect_to(url_for('/staff/home/show.php?id=' . h(u($home['Home_id']))));

  } else {
    $errors = $result;
  }
} else {

$home['Home_id'] = '';
$home['Purchase_Date'] = '';
$home['Home_value'] = '';
$home['Area'] = '';
$home['Home_type'] = '';
$home['Auto_fire'] = '';
$home['Home_sec'] = '';
$home['Pool'] = '';
$home['Basement'] = '';
$home['Policy_no'] = '';

}

?>
<?php $page_title = 'Create Home'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/home/index.php'); ?>">&laquo; Back to List</a>

  <div class="home new">
    <h1>Create Home</h1>
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/staff/home/new.php'); ?>" method="post">
      
      <dl>
        <dt>Home ID</dt>
        <dd><input type="number" name="Home_id" min="10000000" max="99999999"
        value="<?php echo h($home['Home_id']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Purchase Date</dt>
        <dd><input type="date" name="Purchase_Date" value="<?php echo h($home['Purchase_Date']); ?>" /></dd>
      </dl>     
    
      <dl>
        <dt>Home value</dt>
        <dd><input type="number" name="Home_value" value="<?php echo h($home['Home_value']); ?>" /></dd>
      </dl>
      
      <dl>
       <dt>Area</dt>
        <dd><input type="number" name="Area" value="<?php echo h($home['Area']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Home Type</dt>
        <dd><input type="radio" id = "S" name="Home_type" value="S" <?php if($home['Home_type'] == "S") { echo "checked";} ?>
        /><label for="Auto">Single Family</label></dd>
        <dd><input type="radio" id = "M" name="Home_type" value="M" <?php if($home['Home_type'] == "M") { echo "checked";} ?>
        /><label for="Home">Multi Family</label></dd>
        <dd><input type="radio" id = "C" name="Home_type" value="C" <?php if($home['Home_type'] == "C") { echo "checked";} ?>
        /><label for="Auto">Condominium</label></dd>
        <dd><input type="radio" id = "T" name="Home_type" value="T" <?php if($home['Home_type'] == "T") { echo "checked";} ?>
        /><label for="Home">Town House</label></dd>
      </dl>
    
      <dl>
        <dt>Auto Fire Notification</dt>
          <dd>
          <input type="hidden" name="Auto_fire" value="0" />
          <input type="checkbox" name="Auto_fire" value="1" <?php if($home['Auto_fire'] == "1") { echo "checked";} ?>/>
          </dd>      
      </dl>

      <dl>
        <dt>Home Security System</dt>
          <dd>
          <input type="hidden" name="Home_sec" value="0" />
          <input type="checkbox" name="Home_sec" value="1" <?php if($home['Home_sec'] == "1") { echo "checked";} ?>/>
          </dd> 
      </dl>
  
      <dl>
        <dt>Swimming Pool</dt>
          <dd><input type="radio" id = "U" name="Pool" value="U" <?php if($home['Pool'] == "U") { echo "checked";} ?>
          />Underground</dd>
          <dd><input type="radio" id = "O" name="Pool" value="O" <?php if($home['Pool'] == "O") { echo "checked";} ?>
          />Overground</dd>
          <dd><input type="radio" id = "I" name="Pool" value="I" <?php if($home['Pool'] == "I") { echo "checked";} ?>
          />Indoor</dd>
          <dd><input type="radio" id = "M" name="Pool" value="M" <?php if($home['Pool'] == "M") { echo "checked";} ?>
          />Multiple</dd>
      </dl>
      
      <dl>
        <dt>Basement</dt>
          <dd>
          <input type="hidden" name="Basement" value="0" />
          <input type="checkbox" name="Basement" value="1" <?php if($home['Basement'] == "1") { echo "checked";} ?>/>
          </dd> 
      </dl>
      <dl>
        <dt>Policy Number</dt>
        <dd><input type="number" name="Policy_no" min="100000000000" max="999999999999"
        value="<?php echo h($home['Policy_no']); ?>" /></dd>
      </dl>
      
      <div id="operations">
        <input type="submit" value="Create Home" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
