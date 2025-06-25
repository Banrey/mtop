<?php

include("admin.header.php");
if(!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");
$txt_driver_number = "";
if(isset($_GET["search"])){
    
$txt_driver_number = $_GET["search"];
}
$txt_body_number = "";
$txt_driver_order = "";
$txt_full_name = "";
$txt_make = "";
$txt_motor_number = "";
$txt_chasis_number = "";

if (@$_GET["action"] == "update"){
	$sql_cat = "SELECT driver_number , body_number, name, make, motor_number, chasis_number, driver_order
                FROM individual_transaction
                WHERE driver_number = ?";

    if ($cat_check = mysqli_prepare($conn, $sql_cat)){
        mysqli_stmt_bind_param($cat_check, "s", $driver_number,);
        
        $driver_number = $_GET['driver_number'];

        mysqli_stmt_execute($cat_check);
        
        mysqli_stmt_bind_result($cat_check, $driver_number, $body_number, $name, $make, $motor_number, $chasis_number, $driver_order);
        while(mysqli_stmt_fetch($cat_check)){
			
            $txt_driver_number = $driver_number;
            $txt_driver_order = $driver_order;
            $txt_body_number = $body_number;
            $txt_full_name = $name;
            $txt_make = $make;
            $txt_motor_number = $motor_number;
            $txt_chasis_number = $chasis_number;


            
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
                <h3>Owners</h3>
            </div>
        </div>



        <div class="row p-2">

        
        <div class="col-sm-2">                
            <div class="d-inline-flex col-12 p-2">
                <div class="form-group col-12">
                    <label>Body Number *</label>   
                    <input value="<?php echo $txt_body_number; ?>" type="text" id="body_number" class="form-control rounded" placeholder="Body Number" required pattern="[^\s]" title="This is required">            
                </div>
            </div>

        
            
        <div class="d-inline-flex align-bottom p-2 col-12">
                <button type="button" id="BtnSearchBodyNumber" class="btn btn-warning btn-block d-inline">Search</button>
            </div>

            
        </div>
        
        
        
        <div class="col-sm-4 ">                
            <div class="d-inline-flex col-12 p-2">
                <div class="form-group col-12">
                                    <label>Full Name</label>   
                                    <input value="<?php echo $txt_full_name; ?>" type="text" id="full_name" class="form-control rounded col-8" placeholder="Full Name" > 
                                
                </div>
            </div>
            
        <div class="d-inline-flex align-bottom p-2 col-12">
                <button type="button" id="BtnSearchName" class="btn btn-warning btn-block d-inline">Search</button>
            </div>
        </div>
        <div class="col-sm-4 ">                
            <div class="d-inline-flex col-12 p-2">
                <div class="form-group col-12">
                                    <label>Chasis Number</label>   
                                    <input value="<?php echo $txt_chasis_number; ?>" type="text" id="chasis_number" class="form-control rounded col-8" placeholder="Chasis Number" > 
                                
                </div>
            </div>
            
        <div class="d-inline-flex align-bottom p-2 col-12">
                <button type="button" id="BtnSearchChasis" class="btn btn-warning btn-block d-inline">Search</button>
            </div>
        </div>
        <div class="col-sm-4 ">                
            <div class="d-inline-flex col-12 p-2">
                <div class="form-group col-12">
                                    <label>Motor Number</label>   
                                    <input value="<?php echo $txt_motor_number; ?>" type="text" id="motor_number" class="form-control rounded col-8" placeholder="Motor Number" > 
                                
                </div>
            </div>
            
        <div class="d-inline-flex align-bottom p-2 col-12">
                <button type="button" id="BtnSearchMotor" class="btn btn-warning btn-block d-inline">Search</button>
            </div>
        </div>


        

            
        </div>

        
        <div class="container p-3">

        <div class="row"> <!-- row 1 -->
            
           
            <div class="col-sm-3">
                <div class="form-group">
                                    <label>Make</label>   
                                    <input value="<?php echo $txt_make; ?>" type="text" id="make" class="form-control rounded" placeholder="Make" > 
                                
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                                    <label>Driver Order</label>   
                                    <input value="<?php echo $txt_driver_order; ?>" type="text" id="driver_order" class="form-control rounded" placeholder="Driver Order" > 
                                
                </div>
            </div>
        

        </div>
        
        </div>

            
        <div class="row p-3">
            <div class="col-sm-12">
                <div class="form-group">
					<input type="hidden" value="<?php echo $txt_id; ?>" id="body_number" >
					<input type="hidden" value=" <?php echo $txt_driver_number; ?> " id="driver_number" >
                    <button type="button" id="BtnAddUnit" class="btn btn-warning btn-block">Save Record</button>
                    
					<input type="hidden" value="<?php echo $txt_id; ?>" id="clear_filters" >
                    <a href="old_owners.php"><button type="button" class="btn btn-warning btn-block">Clear Search Filters</button></a>

					<input type="hidden" value="<?php echo $txt_id; ?>" id="duplicates" >
                    <button type="button" id="BtnSearchDuplicate" class="float-end btn btn-warning btn-block">Search Duplicates</button>
                                    
                </div>
                
            </div>
        </div>

        <div class="row p-2">
            <div class="col-sm-12 ">
				<table class="table table-striped">
					<thead>
						<tr> 
							<td width= "10%">Action</td>
							<td width= "10%">Body Number</td>
							<td width= "10%">Driver Order</td>
							<td width= "15%">Full Name</td>
							<td width= "15%">Make</td>
							<td width= "15%">Motor  Number</td>
							<td width= "15%">Chasis  Number</td>
							<td width= "5%">Motor  Matches</td>
							<td width= "5%">Chasis  Matches</td>
						</tr>
					</thead>
                    
					<tbody>
                        
						<?php $ctr = 0; ?>
						<?php 
                        if (isset($_GET["search"])&& $_GET["term"]=== "body_number"){

                            $sql_unit = "SELECT  body_number, name, make, motor_number, chasis_number, driver_number , driver_order,
                            (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) as motor_matches,
                            (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) as chasis_matches
                                         FROM individual_transaction as it WHERE body_number = '".$_GET["search"]."'
                                         ORDER BY body_number, driver_order";

                         } 
                        elseif (isset($_GET["search"])&& $_GET["term"]=== "names"){
                             $sql_unit = "SELECT  body_number, name, make, motor_number, chasis_number , driver_number , driver_order,
                             (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) as motor_matches,
                             (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) as chasis_matches
                                         FROM individual_transaction as it WHERE name = '".$_GET["search"]."'
                                         ORDER BY body_number, driver_order";
                          } 
                        elseif (isset($_GET["search"])&& $_GET["term"]=== "chasis_number"){
                             $sql_unit = "SELECT  body_number, name, make, motor_number, chasis_number , driver_number , driver_order,
                             (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) as motor_matches,
                             (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) as chasis_matches
                                         FROM individual_transaction as it WHERE chasis_number = '".$_GET["search"]."'
                                         ORDER BY body_number, driver_order";
                          } 
                        elseif (isset($_GET["search"])&& $_GET["term"]=== "motor_number"){
                             $sql_unit = "SELECT  body_number, name, make, motor_number, chasis_number , driver_number , driver_order,
                             (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) as motor_matches,
                             (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) as chasis_matches
                                         FROM individual_transaction as it WHERE motor_number = '".$_GET["search"]."'
                                         ORDER BY body_number, driver_order";
                          }  
                        elseif (isset($_GET["term"])&& $_GET["term"]=== "duplicate"){
                             $sql_unit = "SELECT body_number, name, make, motor_number, chasis_number , driver_number , driver_order,
                             (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) as motor_matches, 
                             (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) as chasis_matches 
                                        FROM individual_transaction as it 
                                        WHERE 
                                        (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) > 1 
                                        OR 
                                        (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) > 1;
                                        ORDER BY body_number, driver_order ";
                          } else{
                            $sql_unit = "SELECT  body_number, name, make, motor_number, chasis_number, driver_number , driver_order,
                            (SELECT COUNT(motor_number) FROM `individual_transaction` WHERE motor_number = it.motor_number GROUP BY motor_number) as motor_matches,
                            (SELECT COUNT(chasis_number) FROM `individual_transaction` WHERE chasis_number = it.chasis_number GROUP BY chasis_number) as chasis_matches
                                         FROM individual_transaction as it ORDER BY body_number, driver_order " ;

                                        // echo $sql_unit; //debugging show sql
                         }
                         
                         
                         
                         ?>

                        
						<?php $qry_unit = mysqli_query($conn, $sql_unit); ?>
						<?php while($get_unit = mysqli_fetch_array($qry_unit)){ ?>
						<?php $ctr++; ?>
						<tr>
							<td> <a href="old_owners.php?action=update&driver_number=<?php echo $get_unit["driver_number"]; ?>"> 
							Update</a> /
							<a onclick="return confirm('Are you sure?')" href="process.owners.php?action=delete&driver_number=<?php echo $get_unit["driver_number"]; ?>">
							Delete</a>
							</td>
							<td><?php echo $get_unit["body_number"]?></td>
							<td><?php echo $get_unit["driver_order"]?></td>
							<td ><?php echo $get_unit["name"] ?></td>
							<td><?php echo $get_unit["make"] ?></td>
							<td><?php echo $get_unit["motor_number"] ?></td>
							<td><?php echo $get_unit["chasis_number"] ?></td>
							<td><?php if ($get_unit["motor_number"] == null ) {
                                echo "0";
                            } else{ echo $get_unit["motor_matches"]; }  ?></td>
							<td><?php if ($get_unit["chasis_number"] == null ) {
                                echo "0";
                            } else{ echo $get_unit["chasis_matches"]; }  ?></td>
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
    </di>
</div>

<script language="javascript">
        $("#BtnAddUnit").on("click", function() {
                
            var alertNotice = "Fields marked with * are required.";
            

                var txt_driver_number = $("#driver_number").val();
                var txt_driver_order = $("#driver_order").val();
                var txt_body_number = $("#body_number").val();
                var txt_full_name = $("#full_name").val();
                var txt_make = $("#make").val();
                var txt_motor_number = $("#motor_number").val();
                var txt_chasis_number = $("#chasis_number").val();
                
                


                if (txt_body_number == null || txt_body_number == "") {
                    alert(alertNotice);
                    $("#body_number").focus();
                }
                

                else {
                    if (txt_driver_order == null || txt_driver_order == "") {
                    txt_driver_order = 1;
                }

                    
                    $.post("process.owners.php", {
                        driver_number: txt_driver_number,
                        driver_order: txt_driver_order,
                        body_number: txt_body_number,
                        name: txt_full_name,
                        make: txt_make,
                        motor_number: txt_motor_number,
                        chasis_number: txt_chasis_number
                        

                    }, function(data,status) {                        
						if(status == "success"){                            
                        window.location = "old_owners.php";
						}
                    })
                }
            });


            $("#BtnSearchBodyNumber").on("click", function() {
                var txt_body_number = $("#body_number").val();
                let pagelink = "old_owners.php";
                
                let result = pagelink.concat("?search=",txt_body_number);
                result = result.concat("&term=body_number")
               
                
                window.location = result;



            });
            $("#BtnSearchName").on("click", function() {
                var txt_full_name = $("#full_name").val();
                let pagelink = "old_owners.php";
                
                let result = pagelink.concat("?search=",txt_full_name);
                result = result.concat("&term=names")
               
                
                window.location = result;



            });
            
            $("#BtnSearchChasis").on("click", function() {
                var txt_chasis_number = $("#chasis_number").val();
                let pagelink = "old_owners.php";
                
                let result = pagelink.concat("?search=",txt_chasis_number);
                result = result.concat("&term=chasis_number")
               
                
                window.location = result;



            });


            $("#BtnSearchMotor").on("click", function() {
                var txt_motor_number = $("#motor_number").val();
                let pagelink = "old_owners.php";
                
                let result = pagelink.concat("?search=",txt_motor_number);
                result = result.concat("&term=motor_number")
               
                
                window.location = result;



            });

            $("#BtnSearchDuplicate").on("click", function() {
                let pagelink = "old_owners.php";
                
                let result = pagelink.concat("?term=duplicate")
               
                
                window.location = result;



            });


     
    function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
    }
    </script>

<?php
include("admin.footer.php");
?>

