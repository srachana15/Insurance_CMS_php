<?php
require_once('../../private/initialize.php');
$_SESSION['message'] = 'Logout Succesful!';

logged_out_customer();

redirect_to(url_for('/customer/login.php'));

?>