<?php

require_once('../../private/initialize.php');


$id = $_GET['id'] ?? '1';
$id2 = $_GET['id2'] ?? '1';


if($id2=="A"){
	$type = 'Auto';
}
elseif($id2=="H"){
	$type = 'Home';
}
else{
	$type = 'Home and Auto';
}
?>


<?php $page_title = 'Welcome to WDS'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>


<div id="content">
	<h1>Thank you for Application!</h1>
  <a class="back-link" href="<?php echo url_for('index.php'); ?>">&laquo; Back to Home</a>
	<p><?php echo "Dear " . $id . " please check your email for your " . $type . " Application." ?></p>
    <p><?php echo "Someone will soon contact you for additional details!" ?></p>