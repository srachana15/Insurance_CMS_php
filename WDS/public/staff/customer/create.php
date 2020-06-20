<?php require_once('../../../private/initialize.php'); 

require_login();

if(is_post_request()){

  $Cid = $_POST['Cid'] ?? '';
  $Fname = $_POST['Fname'] ?? '';
  $Lname = $_POST['Lname'] ?? '';
  $St = $_POST['St'] ?? '';
  $City = $_POST['City'] ?? '';
  $State = $_POST['State'] ?? '';
  $Zipcode = $_POST['Zipcode'] ?? '';
  $Gender = $_POST['Gender'] ?? '';
  $DOB = $_POST['DOB'] ?? '';
  $M_Status = $_POST['M_Status'] ?? '';
  $C_Type = $_POST['C_Type'] ?? '';
	//$Visible = $_POST['visible'] ?? '';


	$sql = "Insert into customer ";
	$sql .= "(Cid, Fname, Lname, St, City, State, Zipcode, Gender, DOB, M_Status, C_Type) ";
	$sql .= "values (";
	$sql .= "'" . $Cid . "',";
	$sql .= "'" . $Fname . "',";
	$sql .= "'" . $Lname . "',";
	$sql .= "'" . $St . "',";
	$sql .= "'" . $City . "',";
	$sql .= "'" . $State . "',";
	$sql .= "'" . $Zipcode . "',";
	$sql .= "'" . $Gender . "',";
	$sql .= "'" . $DOB . "',";
	$sql .= "'" . $M_Status . "',";
	$sql .= "'" . $C_Type . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/customer/show.php?id=' . $Cid));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/customer/new.php'));
	}

?>