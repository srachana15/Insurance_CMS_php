<?php require_once('../../../private/initialize.php'); 

require_login();

if(is_post_request()){

	$License_no= $_POST['License_no'] ?? '';
	$D_Fname = $_POST['D_Fname'] ?? '';
	$D_Lname = $_POST['D_Lname'] ?? '';
	$D_DOB= $_POST['D_DOB'] ?? '';
	


	$sql = "Insert into drivers ";
	$sql .= "(License_No, D_Fname, D_Lname, D_DOB) ";
	$sql .= "values (";
	$sql .= "'" . $License_no . "',";
	$sql .= "'" . $D_Fname . "',";
	$sql .= "'" . $D_Lname . "',";
	$sql .= "'" . $D_DOB . "'";
	$sql .= ")";
	
	$result = mysqli_query($db, $sql);

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/driver/show.php?id=' . $License_no));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}

}




else{
	redirect_to(url_for('/staff/driver/new.php'));
	}

?>