<?php

	function find_all($table_name){
		global $db;
		$sql_query = " SELECT * FROM $table_name ";
		$sql_query .= "ORDER BY 1 ;";
		$result = mysqli_query($db, $sql_query);
		return $result;
	}

	function find_record($table_name,$key_name,$id){
		global $db;
		$sql = "SELECT * FROM $table_name ";
  		$sql .="WHERE $key_name='" . db_escape($db,$id) . "';";
  		$result = mysqli_query($db, $sql);
  		confirm_result_set($result);

  		$parcel = mysqli_fetch_assoc($result);

  		mysqli_free_result($result);
  		return $parcel;
	
	}

	function find_vehicle_driver_record($id,$id2){
		global $db;  
 		$sql = "SELECT * FROM vehicle_driver ";
  		$sql .="WHERE Vin='" . db_escape($db,$id) . "' AND License_no='" . db_escape($db,$id2) . "';";
  
  		$result = mysqli_query($db, $sql);
  		confirm_result_set($result);

 		$parcel = mysqli_fetch_assoc($result);

		mysqli_free_result($result);  
		return $parcel;
	}

	function delete_record($table_name,$key_name,$id){
		global $db;

	$sql = "DELETE FROM $table_name ";
	$sql .="WHERE $key_name='" . db_escape($db,$id) . "' ";
	$sql .="LIMIT 1;";

	$result = mysqli_query($db, $sql);

	if($result){
		return true;
	} else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}

	}

	function delete_vehicle_driver_record($id,$id2){
		global $db;
		$sql = "DELETE FROM vehicle_driver ";
		$sql .="WHERE Vin='" . db_escape($db,$id) . "' AND License_no='" . db_escape($db,$id2) . "';";

	$result = mysqli_query($db, $sql);

	if($result){
		return true;
	} else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
    }
//////////////////////customer//////////////////////////////////	
	function validate_customer($customer) {
	$errors = [];

    if(is_blank($customer['Cid'])) {
      $errors[] = "Cid cannot be blank. Enter a value between 100000 and 999999";
      } elseif(!has_length($customer['Cid'],['exact'=>'6'])) {
      $errors[] = "Cid must have 6 digits. ";
      }
    if(is_blank($customer['Fname'])) {
      $errors[] = "Missing: First Name";
      } 
    if(is_blank($customer['Lname'])) {
      $errors[] = "Missing: Last Name";
      } 

    if(is_blank($customer['St'])) {
      $errors[] = "Missing: Street Address ";
      } 
    if(is_blank($customer['City'])) {
      $errors[] = "Missing: City ";
      } 
    if(is_blank($customer['State'])) {
      $errors[] = "Missing: State ";
      } elseif(!has_length($customer['State'],['exact'=>'2'])) {
      $errors[] = "State must be 2 characters. Example NY for New York ";
      }
    if(is_blank($customer['Zipcode'])) {
      $errors[] = "Missing: Zipcode";
      } elseif(!has_length($customer['Zipcode'],['exact'=>'5'])) {
      $errors[] = "Zipcode must have 5 digits. ";
      }
    if(is_blank($customer['DOB'])) {
      $errors[] = "Missing: Date of Birth";
      } 
    if(is_blank($customer['M_Status'])) {
      $errors[] = "Please select Marital staus.";
      } 
    if(is_blank($customer['C_Type'])) {
      $errors[] = "Please select Customer type.";
      } 
    return $errors;
	}
	
  function insert_customer($customer) {
  global $db;
    
  $errors = validate_customer($customer);
    if(!empty($errors)) {
      return $errors;
    }
  $sql = "INSERT INTO customer ";
  $sql .= "(Cid, Fname, Lname, St, City, State, Zipcode, Gender, DOB, M_Status, C_Type) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db,$customer['Cid']) . "',";
  $sql .= "'" . db_escape($db,$customer['Fname']) . "',";
  $sql .= "'" . db_escape($db,$customer['Lname']) . "',";
  $sql .= "'" . db_escape($db,$customer['St']) . "',";
  $sql .= "'" . db_escape($db,$customer['City']) . "',";
  $sql .= "'" . db_escape($db,$customer['State']) . "',";
  $sql .= "'" . db_escape($db,$customer['Zipcode']) . "',";
  $sql .= "'" . db_escape($db,$customer['Gender']) . "',";
  $sql .= "'" . db_escape($db,$customer['DOB']) . "',";
  $sql .= "'" . db_escape($db,$customer['M_Status']) . "',";
  $sql .= "'" . db_escape($db,$customer['C_Type']) . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_customer($customer){
  global $db;
  $errors = validate_customer($customer);
    if(!empty($errors)) {
      return $errors;
    }
  $sql = "UPDATE customer SET ";
  $sql .= "Cid='" . db_escape($db,$customer['Cid']) . "',";
  $sql .= "Fname='" . db_escape($db,$customer['Fname']) . "',";
  $sql .= "Lname='" . db_escape($db,$customer['Lname']) . "',";
  $sql .= "St='" . db_escape($db,$customer['St']) . "',";
  $sql .= "City='" . db_escape($db,$customer['City']) . "',";
  $sql .= "State='" . db_escape($db,$customer['State']) . "',";
  $sql .= "Zipcode='" . db_escape($db,$customer['Zipcode']) . "',";
  $sql .= "Gender='" . db_escape($db,$customer['Gender']) . "',";
  $sql .= "DOB='" . db_escape($db,$customer['DOB']) . "',";
  $sql .= "M_Status='" . db_escape($db,$customer['M_Status']) . "',";
  $sql .= "C_Type='" . db_escape($db,$customer['C_Type']) . "' ";
  $sql .= "WHERE Cid='" . db_escape($db,$customer['Cid']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }

///////////////////driver///////////////////////
function validate_driver($driver) {
	$errors = [];

    if(is_blank($driver['License_no'])) {
      $errors[] = "License Number cannot be blank. It must have 10 digits.";
      } elseif(!has_length($driver['License_no'],['exact'=>'10'])) {
      $errors[] = "License Number must have 10 digits. ";
      }
    if(is_blank($driver['D_Fname'])) {
      $errors[] = "Missing: Driver's First Name";
      } 
    if(is_blank($driver['D_Lname'])) {
      $errors[] = "Missing: Driver's Last Name";
      } 

    if(is_blank($driver['D_DOB'])) {
      $errors[] = "Missing: Driver's Date of Birth. Must be same as date on Driver's License";
      } 
    return $errors;
	}
	
  function insert_driver($driver) {
  global $db;
    
  $errors = validate_driver($driver);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql
  $sql = "Insert into drivers ";
  $sql .= "(License_No, D_Fname, D_Lname, D_DOB) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$driver['License_no']) . "',";
  $sql .= "'" . db_escape($db,$driver['D_Fname']) . "',";
  $sql .= "'" . db_escape($db,$driver['D_Lname']) . "',";
  $sql .= "'" . db_escape($db,$driver['D_DOB']) . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_driver($driver){
  global $db;
  $errors = validate_driver($driver);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
  $sql = "UPDATE drivers SET ";
  $sql .= "License_no='" . db_escape($db,$driver['License_no']) . "',";
  $sql .= "D_Fname='" . db_escape($db,$driver['D_Fname']) . "',";
  $sql .= "D_Lname='" . db_escape($db,$driver['D_Lname']) . "',";
  $sql .= "D_DOB='" . db_escape($db,$driver['D_DOB']) . "'";
  $sql .= "WHERE License_no='" . db_escape($db,$driver['License_no']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }
  
///////////////home//////////////////////
function validate_home($home) {
	$errors = [];

    if(is_blank($home['Home_id'])) {
      $errors[] = "Home ID cannot be blank. It must have 8 digits.";
      } elseif(!has_length($home['Home_id'],['exact'=>'8'])) {
      $errors[] = "Home ID must have 8 digits. ";
      }
    if(is_blank($home['Purchase_Date'])) {
      $errors[] = "Missing: Purchase Date";
      } 
    if(is_blank($home['Home_value'])) {
      $errors[] = "Missing: Value of home";
      } 
    if(is_blank($home['Area'])) {
      $errors[] = "Missing: Home Area in sq. ft.";
      } 
    if(is_blank($home['Home_type'])) {
      $errors[] = "Please select the type of house";
      } 
    if(is_blank($home['Policy_no'])) {
      $errors[] = "Policy No. cannot be blank. It must have 12 digits.";
      } elseif(!has_length($home['Policy_no'],['exact'=>'12'])) {
      $errors[] = "Policy No. must have 12 digits. ";
      }
    return $errors;
	}
	
  function insert_home($home) {
  global $db;
    
  $errors = validate_home($home);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql
  $sql = "Insert into home ";
  $sql .= "(Home_id, Purchase_Date, Home_value, Area, Home_type, Auto_fire, Home_sec, Pool, Basement, Policy_no) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$home['Home_id']) . "',";
  $sql .= "'" . db_escape($db,$home['Purchase_Date']) . "',";
  $sql .= "'" . db_escape($db,$home['Home_value']) . "',";
  $sql .= "'" . db_escape($db,$home['Area']) . "',";
  $sql .= "'" . db_escape($db,$home['Home_type']) . "',";
  $sql .= "'" . db_escape($db,$home['Auto_fire']) . "',";
  $sql .= "'" . db_escape($db,$home['Home_sec']) . "',";
  $sql .= "'" . db_escape($db,$home['Pool']) . "',";
  $sql .= "'" . db_escape($db,$home['Basement']) . "',";
  $sql .= "'" . db_escape($db,$home['Policy_no']) . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_home($home){
  global $db;
  $errors = validate_home($home);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
  $sql = "UPDATE home SET ";
  $sql .= "Home_id='" . db_escape($db,$home['Home_id']) . "',";
  $sql .= "Purchase_Date='" . db_escape($db,$home['Purchase_Date']) . "',";
  $sql .= "Home_value='" . db_escape($db,$home['Home_value']) . "',";
  $sql .= "Area='" . db_escape($db,$home['Area']) . "',";
  $sql .= "Home_type='" . db_escape($db,$home['Home_type']) . "',";
  $sql .= "Auto_fire='" . db_escape($db,$home['Auto_fire']) . "',";
  $sql .= "Home_sec='" . db_escape($db,$home['Home_sec']) . "',";
  $sql .= "Pool='" . db_escape($db,$home['Pool']) . "',";
  $sql .= "Basement='" . db_escape($db,$home['Basement']) . "',";
  $sql .= "Policy_no='" . db_escape($db,$home['Policy_no']) . "'";
  $sql .= "WHERE Home_id='" . db_escape($db,$home['Home_id']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }

///////////////invoice//////////////////////
function validate_invoice($invoice) {
	$errors = [];

    if(is_blank($invoice['Invoice_id'])) {
      $errors[] = "Invoice ID cannot be blank. It must have 7 digits.";
      } elseif(!has_length($invoice['Invoice_id'],['exact'=>'7'])) {
      $errors[] = "Invoice ID must have 7 digits. ";
      }
    if(is_blank($invoice['Invoice_amt'])) {
      $errors[] = "Missing: Invoice Amount";
      } 
    if(is_blank($invoice['Due_Date'])) {
      $errors[] = "Missing: Invoice Due Date";
      } 
    if(is_blank($invoice['Policy_no'])) {
      $errors[] = "Policy No. cannot be blank. It must have 12 digits.";
      } elseif(!has_length($invoice['Policy_no'],['exact'=>'12'])) {
      $errors[] = "Policy No. must have 12 digits. ";
      }
    return $errors;
	}
	
  function insert_invoice($invoice) {
  global $db;
    
  $errors = validate_invoice($invoice);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql
  $sql = "Insert into invoice ";
  $sql .= "(Invoice_id, Invoice_amt, Policy_no, Due_Date) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$invoice['Invoice_id']) . "',";
  $sql .= "'" . db_escape($db,$invoice['Invoice_amt']) . "',";
  $sql .= "'" . db_escape($db,$invoice['Policy_no']) . "',";
  $sql .= "'" . db_escape($db,$invoice['Due_Date']) . "'"; 
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_invoice($invoice){
  global $db;
  $errors = validate_invoice($invoice);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
  $sql = "UPDATE invoice SET ";
  $sql .= "Invoice_id='" . db_escape($db,$invoice['Invoice_id']) . "',";
  $sql .= "Invoice_amt='" . db_escape($db,$invoice['Invoice_amt']) . "',";
  $sql .= "Policy_no='" . db_escape($db,$invoice['Policy_no']) . "',";
  $sql .= "Due_Date='" . db_escape($db,$invoice['Due_Date']) . "' ";
  $sql .= "WHERE Invoice_id='" . db_escape($db,$invoice['Invoice_id']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }
  
  ///////////////payment//////////////////////
function validate_payment($payment) {
	$errors = [];

    if(is_blank($payment['Instal_ID'])) {
      $errors[] = "Installment ID cannot be blank. It must have 8 digits.";
      } elseif(!has_length($payment['Instal_ID'],['exact'=>'8'])) {
      $errors[] = "Installment ID must have 8 digits. ";
      }
    if(is_blank($payment['Instal_amt'])) {
      $errors[] = "Missing: Installment Amount";
      } 
    if(is_blank($payment['Pay_date'])) {
      $errors[] = "Missing: Payment Date";
      } 
    if(is_blank($payment['Pay_method'])) {
      $errors[] = "Please select a payment method";
      } 
    if(is_blank($payment['Invoice_id'])) {
      $errors[] = "Invoice ID cannot be blank. It must have 7 digits.";
      } elseif(!has_length($payment['Invoice_id'],['exact'=>'7'])) {
      $errors[] = "Invoice ID must have 7 digits. ";
      }
    return $errors;
	}
	
  function insert_payment($payment) {
  global $db;
    
  $errors = validate_payment($payment);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql
  $sql = "Insert into payment ";
  $sql .= "(Instal_ID, Instal_amt, Pay_date, Pay_method, Invoice_id) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$payment['Instal_ID']) . "',";
  $sql .= "'" . db_escape($db,$payment['Instal_amt']) . "',";
  $sql .= "'" . db_escape($db,$payment['Pay_date']) . "',";
  $sql .= "'" . db_escape($db,$payment['Pay_method']) . "',";
  $sql .= "'" . db_escape($db,$payment['Invoice_id']) . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_payment($payment){
  global $db;
  $errors = validate_payment($payment);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
  $sql = "UPDATE payment SET ";
  $sql .= "Instal_ID='" . db_escape($db,$payment['Instal_ID']) . "',";
  $sql .= "Instal_amt='" . db_escape($db,$payment['Instal_amt']) . "',";
  $sql .= "Pay_date='" . db_escape($db,$payment['Pay_date']) . "',";
  $sql .= "Pay_method='" . db_escape($db,$payment['Pay_method']) . "' ";
  $sql .= "WHERE Instal_ID='" . db_escape($db,$payment['Instal_ID']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }
  
    ///////////////policy//////////////////////
function validate_policy($policy) {
	$errors = [];

    if(is_blank($policy['Policy_no'])) {
      $errors[] = "Policy Number cannot be blank. It must have 12 digits.";
      } elseif(!has_length($policy['Policy_no'],['exact'=>'12'])) {
      $errors[] = "Policy Number must have 12 digits. ";
      }
    if(is_blank($policy['P_Type'])) {
      $errors[] = "Please select a policy type";
      } 
    if(is_blank($policy['Cid'])) {
      $errors[] = "Cid cannot be blank. It must have 6 digits.";
      } elseif(!has_length($policy['Cid'],['exact'=>'6'])) {
      $errors[] = "Cid must have 6 digits. ";
      } 
    if(is_blank($policy['Start_Date'])) {
      $errors[] = "Missing: Start Date";
      } 
    if(is_blank($policy['End_Date'])) {
      $errors[] = "Missing: End Date";
      } 
    if(is_blank($policy['Premium'])) {
      $errors[] = "Missing: Premium Amount";
      } 
    if(is_blank($policy['Status'])) {
      $errors[] = "Please select the status of the policy";
      }
    return $errors;
	}
	
  function insert_policy($policy) {
  global $db;
    
  $errors = validate_policy($policy);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql
  $sql = "Insert into policy ";
  $sql .= "(Policy_no, P_Type, Cid, Start_Date, End_Date, Premium, Status) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$policy['Policy_no']) . "',";
  $sql .= "'" . db_escape($db,$policy['P_Type']) . "',";
  $sql .= "'" . db_escape($db,$policy['Cid']) . "',";
  $sql .= "'" . db_escape($db,$policy['Start_Date']) . "',";
  $sql .= "'" . db_escape($db,$policy['End_Date']) . "',";
  $sql .= "'" . db_escape($db,$policy['Premium']) . "',";
  $sql .= "'" . db_escape($db,$policy['Status']) . "'";
  $sql .= ")";
  
  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_policy($policy){
  global $db;
  $errors = validate_policy($policy);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
  
  $sql = "UPDATE policy SET ";
  $sql .= "Policy_no='" . db_escape($db,$policy['Policy_no']) . "', ";
  $sql .= "P_Type='" . db_escape($db,$policy['P_Type']) . "', ";
  $sql .= "Cid='" . db_escape($db,$policy['Cid']) . "', ";
  $sql .= "Start_Date='" . db_escape($db,$policy['Start_Date']) . "', ";
  $sql .= "End_Date='" . db_escape($db,$policy['End_Date']) . "', ";
  $sql .= "Premium='" . db_escape($db,$policy['Premium']) . "', ";
  $sql .= "Status = '" . db_escape($db,$policy['Status']) . "' ";
  $sql .= "WHERE Policy_no='" . db_escape($db,$policy['Policy_no']) . "' ";
  $sql .= "Limit 1";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }
  
      ///////////////vehicle//////////////////////
function validate_vehicle($vehicle) {
	$errors = [];

    if(is_blank($vehicle['Vin'])) {
      $errors[] = "VIN cannot be blank. It must have 10 digits.";
      } elseif(!has_length($vehicle['Vin'],['exact'=>'10'])) {
      $errors[] = "VIN must have 10 digits. ";
      }
    if(is_blank($vehicle['V_make'])) {
      $errors[] = "Missing: Vehicle Make";
      } 
    if(is_blank($vehicle['V_model'])) {
      $errors[] = "Missing: Vehicle Model";
      } 
    if(is_blank($vehicle['V_year'])) {
      $errors[] = "Missing: Year";
      } 
    if(is_blank($vehicle['V_status'])) {
      $errors[] = "Please select vehicle status";
      } 
    if(is_blank($vehicle['Policy_no'])) {
      $errors[] = "Policy Number cannot be blank. It must have 12 digits.";
      } elseif(!has_length($vehicle['Policy_no'],['exact'=>'12'])) {
      $errors[] = "Policy Number must have 12 digits. ";
      }  
   
    return $errors;
	}
	
  function insert_vehicle($vehicle) {
  global $db;
    
  $errors = validate_vehicle($vehicle);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql
  $sql = "Insert into vehicle ";
  $sql .= "(Vin, V_make, V_model, V_year, V_status, Policy_no) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$vehicle['Vin']) . "',";
  $sql .= "'" . db_escape($db,$vehicle['V_make']) . "',";
  $sql .= "'" . db_escape($db,$vehicle['V_model']) . "',";
  $sql .= "'" . db_escape($db,$vehicle['V_year']) . "',";
  $sql .= "'" . db_escape($db,$vehicle['V_status']) . "',";
  $sql .= "'" . db_escape($db,$vehicle['Policy_no']) . "'";
  $sql .= ")";
  
  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_vehicle($vehicle){
  global $db;
  $errors = validate_vehicle($vehicle);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
  $sql = "UPDATE vehicle SET ";
  $sql .= "Vin='" . db_escape($db,$vehicle['Vin']) . "',";
  $sql .= "V_make='" . db_escape($db,$vehicle['V_make']) . "',";
  $sql .= "V_model='" . db_escape($db,$vehicle['V_model']) . "',";
  $sql .= "V_year='" . db_escape($db,$vehicle['V_year']) . "',";
  $sql .= "V_status='" . db_escape($db,$vehicle['V_status']) . "',";
  $sql .= "Policy_no='" . db_escape($db,$vehicle['Policy_no']) . "' ";
  $sql .= "WHERE Vin='" . db_escape($db,$vehicle['Vin']) . "' ";
  $sql .= "Limit 1;";

  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }
  
    
      ///////////////vehicle_driver//////////////////////
function validate_vehicle_driver($vehicle_driver) {
	$errors = [];

    if(is_blank($vehicle_driver['Vin'])) {
      $errors[] = "VIN cannot be blank. It must have 10 digits.";
      } elseif(!has_length($vehicle_driver['Vin'],['exact'=>'10'])) {
      $errors[] = "VIN must have 10 digits. ";
      }
    if(is_blank($vehicle_driver['License_no'])) {
      $errors[] = "License no cannot be blank. It must have 10 digits.";
      } elseif(!has_length($vehicle_driver['License_no'],['exact'=>'10'])) {
      $errors[] = "License no must have 10 digits. ";
      } 
    if(is_blank($vehicle_driver['Rating'])) {
      $errors[] = "Missing: Rating. Value must be between 1 to 10";
      } 
    return $errors;
	}
	
  function insert_vehicle_driver($vehicle_driver) {
  global $db;
    
  $errors = validate_vehicle_driver($vehicle_driver);
    if(!empty($errors)) {
      return $errors;
    }
//insert sql

  $sql = "Insert into vehicle_driver ";
  $sql .= "(Vin, License_no, Rating) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$vehicle_driver['Vin']) . "',";
  $sql .= "'" . db_escape($db,$vehicle_driver['License_no']) . "',";
  $sql .= "'" . db_escape($db,$vehicle_driver['Rating']) . "'";
  $sql .= ")";
  
  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_vehicle_driver($vehicle_driver){
  global $db;
  $errors = validate_vehicle_driver($vehicle_driver);
    if(!empty($errors)) {
      return $errors;
    }
//update sql
//UPDATE `vehicle_driver` SET `Rating` = '9' WHERE `vehicle_driver`.`Vin` = 'C167731467' AND `vehicle_driver`.`License_no` = 'A465488148';
  $sql = "UPDATE vehicle_driver SET ";
  $sql .= "Vin='" . db_escape($db,$vehicle_driver['Vin']) . "', ";
  $sql .= "License_no='" . db_escape($db,$vehicle_driver['License_no']) . "', ";
  $sql .= "Rating='" . db_escape($db,$vehicle_driver['Rating']) . "' ";
  $sql .= "WHERE Vin='" . db_escape($db,$vehicle_driver['Vin']) . "' ";
  $sql .= "AND License_no='" . db_escape($db,$vehicle_driver['License_no']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }

  ////////////////////////requets///////////////////////

  function validate_request($request) {
  $errors = [];

    if(is_blank($request['Fname'])) {
      $errors[] = "Missing: First Name";
      } 
    if(is_blank($request['Lname'])) {
      $errors[] = "Missing: Last Name";
      } 
    if(is_blank($request['Email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($request['Email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($request['Email'])) {
      $errors[] = "Email must be a valid format.";
    }
    if(is_blank($request['St'])) {
      $errors[] = "Missing: Street Address ";
      } 
    if(is_blank($request['City'])) {
      $errors[] = "Missing: City ";
      } 
    if(is_blank($request['State'])) {
      $errors[] = "Missing: State ";
      } elseif(!has_length($request['State'],['exact'=>'2'])) {
      $errors[] = "State must be 2 characters. Example NY for New York ";
      }
    if(is_blank($request['Zipcode'])) {
      $errors[] = "Missing: Zipcode";
      } elseif(!has_length($request['Zipcode'],['exact'=>'5'])) {
      $errors[] = "Zipcode must have 5 digits. ";
      }
    if(is_blank($request['DOB'])) {
      $errors[] = "Missing: Date of Birth";
      } 
    if(is_blank($request['M_Status'])) {
      $errors[] = "Please select Marital staus.";
      } 
     return $errors;
  }

  function insert_request($request){
  global $db;
  $errors = validate_request($request);
    if(!empty($errors)) {
      return $errors;
    }
  $sql = "Insert into request ";
  $sql .= "(Fname, Lname, Email, St, City, State, Zipcode, Gender, DOB, M_Status, Itype) ";
  $sql .= "values (";
  $sql .= "'" . db_escape($db,$request['Fname']) . "',";
  $sql .= "'" . db_escape($db,$request['Lname']) . "',";
  $sql .= "'" . db_escape($db,$request['Email']) . "',";
  $sql .= "'" . db_escape($db,$request['St']) . "',";
  $sql .= "'" . db_escape($db,$request['City']) . "',";
  $sql .= "'" . db_escape($db,$request['State']) . "',";
  $sql .= "'" . db_escape($db,$request['Zipcode']) . "',";
  $sql .= "'" . db_escape($db,$request['Gender']) . "',";
  $sql .= "'" . db_escape($db,$request['DOB']) . "',";
  $sql .= "'" . db_escape($db,$request['M_Status']) . "',";
  $sql .= "'" . db_escape($db,$request['Itype']) . "'";
  $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  //////////////////////ADMIN//////////////////////////////////  
function validate_admin($admin, $option=[]) {

    $password_required = $option['password_required'] ?? True;

    $errors=[];

    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }    

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
      $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

    if($password_required)
  {

    if(is_blank($admin['hashed_password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($admin['hashed_password'], array('min' => 8))) {
      $errors[] = "Password must contain 9 or more characters";
    } elseif (!preg_match('/[A-Z]/', $admin['hashed_password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $admin['hashed_password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $admin['hashed_password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['hashed_password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($admin['confirmed_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($admin['hashed_password'] !== $admin['confirmed_password']) {
      $errors[] = "Password and confirm password must match.";
    }
  }

    return $errors;
  }

  
  function insert_admin($admin) {
  global $db;
    
  $errors = validate_admin($admin);
    if(!empty($errors)) {
      return $errors;
    }

  $hashed_password = password_hash($admin['hashed_password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO admins ";
  $sql .= "(first_name, last_name, email, username, hashed_password) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db,$admin['first_name']) . "',";
  $sql .= "'" . db_escape($db,$admin['last_name']) . "',";
  $sql .= "'" . db_escape($db,$admin['email']) . "',";
  $sql .= "'" . db_escape($db,$admin['username']) . "',";
  $sql .= "'" . db_escape($db,$hashed_password) . "'";
 
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_admin($admin){
  global $db;

  $password_sent = !is_blank($admin['hashed_password']);
  
  $errors = validate_admin($admin, ['password_required' => $password_sent]);
    if(!empty($errors)) {
      return $errors;
    }

  $hashed_password = password_hash($admin['hashed_password'], PASSWORD_BCRYPT);

  $sql = "UPDATE admins SET ";
  $sql .= "first_name='" . db_escape($db,$admin['first_name']) . "',";
  $sql .= "last_name='" . db_escape($db,$admin['last_name']) . "',";
  $sql .= "email='" . db_escape($db,$admin['email']) . "',";
  if($password_sent){
    $sql .= "hashed_password='" . db_escape($db,$hashed_password) . "',";
  }
  $sql .= "username='" . db_escape($db,$admin['username']) . "' ";
  
  $sql .= "WHERE id='" . db_escape($db,$admin['id']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }

  function find_admin($id){
    global $db;
    $sql = "SELECT * FROM admins ";
      $sql .="WHERE username='" . db_escape($db,$id) . "';";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);

      $parcel = mysqli_fetch_assoc($result);

      mysqli_free_result($result);
      return $parcel;
    }


    function validate_customer_login($customer_login, $option=[]) {

    $password_required = $option['password_required'] ?? True;

    $errors=[];

    if(is_blank($customer_login['Cid'])) {
      $errors[] = "Cid cannot be blank. It must have 6 digits.";
      } elseif(!has_length($customer_login['Cid'],['exact'=>'6'])) {
      $errors[] = "Cid must have 6 digits. ";
    }

    if(is_blank($customer_login['username'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($customer_login['username'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }    

    if($password_required)
  {

    if(is_blank($customer_login['hashed_password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($customer_login['hashed_password'], array('min' => 8))) {
      $errors[] = "Password must contain 9 or more characters";
    } elseif (!preg_match('/[A-Z]/', $customer_login['hashed_password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $customer_login['hashed_password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $customer_login['hashed_password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $customer_login['hashed_password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($customer_login['confirmed_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($customer_login['hashed_password'] !== $customer_login['confirmed_password']) {
      $errors[] = "Password and confirm password must match.";
    }
  }

    return $errors;
  }

  
  function insert_customer_login($customer_login) {
  global $db;
    
  $errors = validate_customer_login($customer_login);
    if(!empty($errors)) {
      return $errors;
    }

  $hashed_password = password_hash($customer_login['hashed_password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO customer_login ";
  $sql .= "(Cid, username, hashed_password) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db,$customer_login['Cid']) . "',";
  $sql .= "'" . db_escape($db,$customer_login['username']) . "',";
  $sql .= "'" . db_escape($db,$hashed_password) . "'";
 
  $sql .= ")";

  $result = mysqli_query($db, $sql);

    if($result){
    return true;
    } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
  }

  function update_customer_login($customer_login){
  global $db;

  $password_sent = !is_blank($customer_login['hashed_password']);
  
  $errors = validate_customer_login($customer_login, ['password_required' => $password_sent]);
    if(!empty($errors)) {
      return $errors;
    }

  $hashed_password = password_hash($customer_login['hashed_password'], PASSWORD_BCRYPT);

  $sql = "UPDATE customer_login SET ";
  $sql .= "Cid='" . db_escape($db,$customer_login['Cid']) . "',";
  $sql .= "username='" . db_escape($db,$customer_login['username']) . "',";
  if($password_sent){
    $sql .= "hashed_password='" . db_escape($db,$hashed_password) . "' ";
  }
 
  $sql .= "WHERE Cid='" . db_escape($db,$customer_login['Cid']) . "' ";
  $sql .= "Limit 1;";


  $result = mysqli_query($db, $sql);
  //for insert statement the result is True or False

  if($result){
    return true;
  } else {
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
  }

  function find_customer_login($id){
    global $db;
      $sql = "SELECT Cid, username, hashed_password FROM customer_login ";
      $sql .="WHERE username='" . db_escape($db,$id) . "';";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);

      $parcel = mysqli_fetch_assoc($result);

      mysqli_free_result($result);
      return $parcel;
    }



?>