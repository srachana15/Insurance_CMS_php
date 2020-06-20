<?php require_once('../../../private/initialize.php'); 

if(is_post_request()){

  
  $Policy_no = $_POST['Policy_no'] ?? '';
  $P_Type = $_POST['P_Type'] ?? '';
  $Cid = $_POST['Cid'] ?? '';
  $Start_Date = $_POST['Start_Date'] ?? '';
  $End_Date = $_POST['End_Date'] ?? '';
  $Premium = $_POST['Premium'] ?? '';
  $Status = $_POST['Status'] ?? '';


	$sql = "Insert into policy ";
	$sql .= "(Policy_no, P_Type, Cid, Start_Date, End_Date, Premium, Status) ";
	$sql .= "values (";
	$sql .= "'" . $Policy_no . "',";
	$sql .= "'" . $P_Type . "',";
	$sql .= "'" . $Cid . "',";
	$sql .= "'" . $Start_Date . "',";
	$sql .= "'" . $End_Date . "',";
	$sql .= "'" . $Premium . "',";
	$sql .= "'" . $Status . "'";
		$sql .= ")";

	$result = mysqli_query($db, $sql);
	//for insert statement the result is True or False

	if($result){
		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/policy/show.php?id=' . $Policy_no));

	} else {
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
}
else{
	redirect_to(url_for('/staff/policy/new.php'));
	}

	?>

