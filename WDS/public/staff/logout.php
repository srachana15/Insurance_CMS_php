<?php
require_once('../../private/initialize.php');
$_SESSION['message'] = 'Logout Succesful!';

logged_out_admin();

redirect_to(url_for('/index.php'));

?>
