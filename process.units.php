<?php
if (!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");



if (@$_GET["action"] == "delete"){
	$sql_delete = "DELETE FROM mtop_masterlist_2024 WHERE body_number = ?";
	if ($delete_check = mysqli_prepare($conn, $sql_delete)){
		mysqli_stmt_bind_param($delete_check, "i", $body_number);
		$body_number = $_GET["body_number"];
		mysqli_stmt_execute($delete_check);
		header("location: update.php");
		exit();
	}
}
else{ $checksql = "SELECT COUNT(body_number) FROM mtop_masterlist_2024 AS ctr WHERE body_number = ?";

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
		$sql_check = "INSERT INTO mtop_masterlist_2024 (names, route, date_of_expiry, resolution_number, date_received, date_released, status, body_number, latest_transaction) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		if ($statement_check = mysqli_prepare($conn, $sql_check)){
			mysqli_stmt_bind_param($statement_check, "sssssssss",  $names, $route, $date_of_expiry, $resolution_number, $date_received, $date_released, $status, $body_number, $latest_transaction );
			
			$names = $_POST["names"];
			$route = $_POST["route"];
			$date_of_expiry = $_POST["date_of_expiry"];
			$resolution_number = $_POST["resolution_number"];
			$date_received = $_POST["date_received"];
			$date_released = $_POST["date_released"];
			$status = $_POST["status"];
			$body_number = $_POST["body_number"];
			$latest_transaction = $_POST["latest_transaction"];

			mysqli_stmt_execute($statement_check);
        
		}
	}
	else{
		$sqlML = "UPDATE mtop_masterlist_2024 SET names = ?, route = ?, date_of_expiry = ?, resolution_number = ?, date_received = ?, date_released = ?, status = ?, latest_transaction = ? WHERE body_number = ?";
		if ($statement_check = mysqli_prepare($conn, $sqlML)){
			mysqli_stmt_bind_param($statement_check, "sssssssss" , $names, $route, $date_of_expiry, $resolution_number, $date_received, $date_released, $status, $latest_transaction, $body_number);
			
			$names = $_POST["names"];
			$route = $_POST["route"];
			$date_of_expiry = $_POST["date_of_expiry"];
			$resolution_number = $_POST["resolution_number"];
			$date_received = $_POST["date_received"];
			$date_released = $_POST["date_released"];
			$status = $_POST["status"];
			$latest_transaction = $_POST["latest_transaction"];
			$body_number = $_POST["body_number"];
		
			mysqli_stmt_execute($statement_check);
        
		}

	}

    
}