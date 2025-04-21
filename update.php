<?php

include("admin.header.php");
if(!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");
$txt_body_number = "";
$txt_full_name = "";
$txt_route = "";
$txt_date_of_expiry = "";
$txt_motor_number = "";
$txt_chasis_number = "";
$txt_plate_number = "";
$txt_status = "";
if (@$_GET["action"] == "update"){
	$sql_cat = "SELECT  ml.body_number, ml.names, ml.route, ml.date_of_expiry, it.motor_number, it.chasis_number, ml.status
                FROM mtop_masterlist_2024 ml 
                JOIN individual_transaction it ON it.body_number = ml.body_number 
                WHERE ml.body_number = ?";

    if ($cat_check = mysqli_prepare($conn, $sql_cat)){
        mysqli_stmt_bind_param($cat_check, "i", $body_number,);
        
        $body_number = $_GET['body_number'];

        mysqli_stmt_execute($cat_check);
        
        mysqli_stmt_bind_result($cat_check, $body_number, $names, $route, $date_of_expiry, $motor_number, $chasis_number, $status);
        while(mysqli_stmt_fetch($cat_check)){
			
            $txt_body_number = $body_number;
            $txt_full_name = $names;
            $txt_route = $route;
            $txt_date_of_expiry = $date_of_expiry;
            $txt_motor_number = $motor_number;
            $txt_chasis_number = $chasis_number;
            $txt_status = $status;



            
        }
    }

}

?>

<div class="container my-1 border">
    <div class="row">
        <div class="col-sm-12 "><?php include("navigation.php") ?></div>
        </div>
    </div>
    <div class="container border">
        <div class="row p-2">
            <div class="col-sm-12 ">
                <h3>Units *</h3>
            </div>
        </div>

        <div class="row p-2">
        
        <div class="col-sm-2 ">
            <div class="form-group">
                                <label>Body Number</label>   
                                <input value="<?php echo $txt_body_number; ?>" type="text" id="body_number" class="form-control rounded" placeholder="Body Number" > 
                            
            </div>
        </div>
        
        <div class="col-sm-3 ">
            <div class="form-group">
                                <label>Full Name</label>   
                                <input value="<?php echo $txt_full_name; ?>" type="text" id="full_name" class="form-control rounded" placeholder="Full Name" > 
                            
            </div>
        </div>
        
        <div class="col-sm-3 ">
            <div class="form-group">
                                <label>Motor Number</label>   
                                <input value="<?php echo $txt_motor_number; ?>" type="text" id="motor_number" class="form-control rounded" placeholder="Motor Number" > 
                            
            </div>
        </div>
        
        <div class="col-sm-3 ">
            <div class="form-group">
                                <label>Chasis Number</label>   
                                <input value="<?php echo $txt_chasis_number; ?>" type="text" id="chasis_number" class="form-control rounded" placeholder="Chasis Number" > 
                            
            </div>
        </div>
        
        <div class="col-sm-4 ">
            <div class="form-group">
                                <label>Route</label>   
                                <input value="<?php echo $txt_route; ?>" type="text" id="route" class="form-control rounded" placeholder="Route" > 
                            
            </div>
        </div>
        
        <div class="col-sm-2 ">
            <div class="form-group">
                                <label>Plate Number</label>   
                                <input value="<?php echo $txt_plate_number; ?>" type="text" id="plate_number" class="form-control rounded" placeholder="Plate Number" > 
                            
            </div>
        </div>
        
        <div class="col-sm-2 ">
            <div class="form-group">
                                <label>Date of Expiry</label>   
                                <input value="<?php echo $txt_date_of_expiry; ?>" type="date" id="date_of_expiry" class="form-control rounded" placeholder="Date of Expiry" > 
                            
            </div>
        </div>
        
        <div class="col-sm-3 ">
            <div class="form-group">
                                <label>Status</label>   
                                <input value="<?php echo $txt_status; ?>" type="text" id="status" class="form-control rounded" placeholder="Status" > 
                            
            </div>
        </div>

            
        <div class="row p-3">
            <div class="col-sm-2 ">
                <div class="form-group">
					<input type="hidden" value="<?php echo $txt_id; ?>" id="body_number" >
                    <button type="button" id="BtnAddUnit" class="btn btn-warning btn-block">Save Record</button>
                                    
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-12 ">
				<table border="1" class="table table-striped">
					<thead>
						<tr> 
							<td width= "10%">Action</td>
							<td width= "10%">Body Number</td>
							<td width= "15%">Full Name</td>
							<td width= "10%">Motor Number</td>
							<td width= "10%">Chasis  Number</td>
							<td width= "10%">Plate  Number</td>
							<td width= "10%">Route</td>
							<td width= "10%">Date of Expiry</td>
							<td width= "10%">Status</td>
						</tr>
					</thead>
					<tbody>
						<?php $ctr = 0; ?>
						<?php $sql_unit = "
						SELECT 
							ml.body_number, ml.names, ml.route, ml.date_of_expiry, it.motor_number, it.chasis_number, ml.status
						FROM mtop_masterlist_2024 AS ml
						LEFT JOIN
							individual_transaction AS it ON ml.body_number = it.body_number
							" ?>
						<?php $qry_unit = mysqli_query($conn, $sql_unit); ?>
						<?php while($get_unit = mysqli_fetch_array($qry_unit)){ ?>
						<?php $ctr++; ?>
						<tr>
							<td> <a href="update.php?action=update&body_number=<?php echo $get_unit["body_number"]; ?>"> 
							Update</a> /
							<a href="process.reject.php?action=reject&transaction_ID=<?php echo $get_unit["body_number"]; ?>">
							Delete</a>
							</td>
							<td><?php echo $get_unit["body_number"]?></td>
							<td><?php echo $get_unit["names"] ?></td>
							<td><?php echo $get_unit["motor_number"] ?></td>
							<td><?php echo $get_unit["chasis_number"] ?></td>
							<td><?php echo "No plates yet" ?></td>
							<td><?php echo $get_unit["route"] ?></td>
							<td><?php echo $get_unit["date_of_expiry"] ?></td>
							<td class="text-end"><?php echo $get_unit["status"] ?></td>
						</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan = "3">Total Entries :<?php echo $ctr; ?></td>
						</tr>
					</tfoot>
				</table>
            </div>            
        </div>
    </div>
</div>

<script language="javascript">
        $("#BtnAddUnit").on("click", function() {
                
            var alertNotice = "Fields marked with * are required.";
            

                var txt_body_number = $("#body_number").val();
                var txt_chasis_number = $("#chasis_number").val();
                var txt_date_of_expiry = $("#date_of_expiry").val();
                var txt_full_name = $("#full_name").val();
                var txt_motor_number = $("#motor_number").val();
                //var txt_plate_number = $("#date_of_expiry").val(); unimplemented
                var txt_route = $("#route").val();
                var txt_status = $("#status").val();
                


                if (txt_body_number == null || txt_body_number == "") {
                    alert(alertNotice);
                    $("#body_number").focus();
                }
                

                else {
                    
                    $.post("process.units.php", {
                        body_number: txt_body_number,
                        chasis_number: txt_chasis_number,
                        date_of_expiry: txt_date_of_expiry,
                        names: txt_full_name,
                        motor_number: txt_motor_number,
                        route: txt_route,
                        status: txt_status

                    }, function(data,status) {
                        
						if(status == "success"){
                            alert(data);
                        window.location = "update.php";
						}
                    })
                }
            });


    </script>

<?php
include("admin.footer.php");
?>
