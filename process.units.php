<?php
if (!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");



if (@$_GET["action"] == "delete"){
	$sql_delete = "DELETE FROM mtop_masterlist_2024 AS ml
					LEFT JOIN individual_transaction AS it ON ml.body_number = it.body_number WHERE ID = ?";
	if ($delete_check = mysqli_prepare($conn, $sql_delete)){
		mysqli_stmt_bind_param($delete_check, "i", $id);
		$id = $_GET["id"];
		mysqli_stmt_execute($delete_check);
		header("location: update.php");
		exit();
	}
}
else{
	if (empty($_POST["body_number"])){
		$sql_check = "INSERT INTO categories (category, description) VALUES (?, ?)";
		if ($statement_check = mysqli_prepare($conn, $sql_check)){
			mysqli_stmt_bind_param($statement_check, "ss", $category, $description);
			
			$category = $_POST['category'];
			$description = $_POST['description']; 
			mysqli_stmt_execute($statement_check);
        
		}
	}
	else{
		$sqlML = "UPDATE mtop_masterlist_2024 SET names = ?, route = ?, date_of_expiry = ?, resolution_number = ?, date_received = ?, date_released = ?, status = ?, latest_transaction = ? WHERE body_number = ?";
		if ($statement_check = mysqli_prepare($conn, $sqlML)){
			mysqli_stmt_bind_param($statement_check, "sssssssss" , $names, $route, $date_of_expiry, $resolution_number, $date_received, $date_released, $status, $body_number, $latest_transaction );
			
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


		// $sqlIT = "UPDATE individual_transaction SET chasis_number = ?, motor_number = ? WHERE body_number = ?";
		// if ($statement_check = mysqli_prepare($conn, $sqlIT)){
		// 	mysqli_stmt_bind_param($statement_check, "sss", $chasis_number, $motor_number, $body_number);
			
		// 	$chasis_number = $_POST["chasis_number"];
		// 	$motor_number = $_POST['motor_number'];
		// 	$body_number = $_POST['body_number'];
			?>
			<script> //alert("<?php // echo $body_number; ?>")</script>
			<?php
		// 	//mysqli_stmt_execute($statement_check);
        
		// }
	}

    
}