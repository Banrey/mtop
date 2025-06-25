<?php
if (!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");



if (@$_GET["action"] == "delete"){
	$sql_delete = "DELETE FROM individual_transaction WHERE driver_number = ?";
	if ($delete_check = mysqli_prepare($conn, $sql_delete)){
		mysqli_stmt_bind_param($delete_check, "i", $driver_number);
		$driver_number = $_GET["driver_number"];
		mysqli_stmt_execute($delete_check);
		header("location: old_owners.php");
		exit();
	}
}
else{ $checksql = "SELECT COUNT(driver_number) FROM individual_transaction AS ctr WHERE driver_number = ?";

	if ($statement_check = mysqli_prepare($conn, $checksql)){
		mysqli_stmt_bind_param($statement_check, "s",  $driver_number );
		
		$driver_number = $_POST["driver_number"];
		mysqli_stmt_execute($statement_check);

		mysqli_stmt_bind_result($statement_check, $CTR);

		while(mysqli_stmt_fetch($statement_check)){
			
            $check_driver_number = $CTR;



            
        }
	
	}



	if ($check_driver_number < 1){
		$sql_check = "INSERT INTO individual_transaction (body_number, name, make, motor_number, chasis_number, driver_order) VALUES (?, ?, ?, ?, ?, ?)";
		if ($statement_check = mysqli_prepare($conn, $sql_check)){
			mysqli_stmt_bind_param($statement_check, "sssssi",  $body_number, $name, $make, $motor_number, $chasis_number, $driver_order);
			
			$body_number = $_POST["body_number"];
			$name = $_POST["name"];
			$make = $_POST["make"];
			$motor_number = $_POST["motor_number"];
			$chasis_number = $_POST["chasis_number"];
			$driver_order = $_POST["driver_order"];

			mysqli_stmt_execute($statement_check);
        
		}
	}
	else{
		$sqlIT = "UPDATE individual_transaction SET body_number = ? , name = ?, make = ?, motor_number = ?, chasis_number = ? , driver_order = ? WHERE driver_number  = ?";
		if ($statement_check = mysqli_prepare($conn, $sqlIT)){
			mysqli_stmt_bind_param($statement_check, "sssssis" , $body_number, $name, $make, $motor_number, $chasis_number, $driver_order , $driver_number );
			
			$body_number = $_POST["body_number"];
			$name = $_POST["name"];
			$make = $_POST["make"];
			$motor_number = $_POST["motor_number"];
			$chasis_number = $_POST["chasis_number"];
			$driver_number = $_POST["driver_number"];
			$driver_order = $_POST["driver_order"];
		
			mysqli_stmt_execute($statement_check);
        
		}

	}

    
}