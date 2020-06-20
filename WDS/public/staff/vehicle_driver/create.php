<?php require_once('../../../private/initialize.php'); 

if(is_post_request()){

  $Vin = $_POST['Vin'] ?? '';
  $License_no = $_POST['License_no'] ?? '';
  $Rating = $_POST['Rating'] ?? '';

	$sql = "Insert into vehicle_driver ";
	$sql .= "(Vin, License_no, Rating) ";
	$sql .= "values (";
	$sql .= "'" . $Vin . "',";
	$sql .= "'" . $License_no . "',";
	$sql .= "'" . $Rating . "'";
	$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/vehicle_driver/show.php?id=' . $Vin . '&id2=' . $License_no));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/vehicle_driver/new.php'));
	}

?>