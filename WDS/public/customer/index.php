<?php require_once('../../private/initialize.php'); 

$page_name='Home Insurance'; 
$page_title='Home Insurance'; 


if(is_post_request()){

  $report = [];
  $report['new_old'] = $_POST['new_old'] ?? '';
  
} else {
  $report['new_old'] = '';
}

if($report['new_old'] == "N") {
	#echo "New";
	redirect_to(url_for('/customer/new.php'));
} 
elseif($report['new_old'] == "E") {
	#echo "Old";
	redirect_to(url_for('/customer/login.php'));
}
else {

}

?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="Main">	
	<div id="Page">

	<h1>Welcome</h1>
    <?php echo display_errors($errors); ?>
	<a class="back-link" href="<?php echo url_for('index.php'); ?>">&laquo; Back To Main Menu</a>

	<form action="<?php echo url_for('/customer/index.php'); ?>" method="post">
	  <dl>
        <dt>Existing or New Customer?</dt>
        <dd><input type="radio" id = "New" name="new_old" value="N" <?php if($report['new_old'] == "N") { echo "checked";} ?>
        /><label for="New">New</label></dd>
        <dd><input type="radio" id = "Existing" name="new_old" value="E" <?php if($report['new_old'] == "E") { echo "checked";} ?>
        /><label for="Existing">Existing</label></dd>

      </dl>

      <div id="operations">
        <input type="submit" value="Submit" />
      </div>
  	</form>
	</div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

