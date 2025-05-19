<?php
if (!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");



if (@$_GET["action"] == "delete"){
	$sql_delete = "DELETE FROM individual_transaction WHERE body_number = ?";
	if ($delete_check = mysqli_prepare($conn, $sql_delete)){
		mysqli_stmt_bind_param($delete_check, "i", $body_number);
		$body_number = $_GET["body_number"];
		mysqli_stmt_execute($delete_check);
		header("location: old_owners.php");
		exit();
	}
}
else{ $checksql = "SELECT COUNT(body_number) FROM individual_transaction AS ctr WHERE body_number = ?";

	if ($statement_check = mysqli_prepare($conn, $checksql)){
		mysqli_stmt_bind_param($statement_check, "s",  $body_number );
		
		$body_number = $_POST["body_number"];
		mysqli_stmt_execute($statement_check);

		mysqli_stmt_bind_result($statement_check, $CTR);

		while(mysqli_stmt_fetch($statement_check)){
			
            $check_body_number = $CTR;



            
        }
	
	}



	if ($check_body_number === 0){
		$sql_check = "INSERT INTO individual_transaction (body_number, name, make, motor_number, chasis_number) VALUES (?, ?, ?, ?, ?)";
		if ($statement_check = mysqli_prepare($conn, $sql_check)){
			mysqli_stmt_bind_param($statement_check, "sssss",  $body_number, $name, $make, $motor_number, $chasis_number);
			
			$body_number = $_POST["body_number"];
			$name = $_POST["name"];
			$make = $_POST["make"];
			$motor_number = $_POST["motor_number"];
			$chasis_number = $_POST["chasis_number"];

			mysqli_stmt_execute($statement_check);
        
		}
	}
	else{
		$sqlIT = "UPDATE individual_transaction SET name = ?, make = ?, motor_number = ?, chasis_number = ? WHERE body_number = ?";
		if ($statement_check = mysqli_prepare($conn, $sqlIT)){
			mysqli_stmt_bind_param($statement_check, "sssss" , $name, $make, $motor_number, $chasis_number, $body_number );
			
			$body_number = $_POST["body_number"];
			$name = $_POST["name"];
			$make = $_POST["make"];
			$motor_number = $_POST["motor_number"];
			$chasis_number = $_POST["chasis_number"];
		
			mysqli_stmt_execute($statement_check);
        
		}

	}

    
}