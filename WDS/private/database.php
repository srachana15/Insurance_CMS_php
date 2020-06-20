<?php

require_once('db_credentials.php');

function db_connect(){
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS,DB_NAME);
	confirm_connection();
	return $connection;
}

function db_disconnect($connection){
	if(isset($connection)){
	mysqli_close($connection);
}
}

function db_escape($connection, $string){
	return mysqli_real_escape_string($connection,$string);
}

function confirm_connection(){
	if (mysqli_connect_errno()){
		$msg = "Database Connection Failed: ";
		$msg .= mysqli_connect_error();
		$msg .= "(" . mysqli_connect_errno() . ")";
		exit($msg);
}
}

function confirm_result_set($result_set){
	if (!$result_set){
		exit("Database Query Failed");
	}
}
?>