<?php

include("admin.header.php");
if(!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");
$txt_body_number = "";
if(isset($_GET["search"])){
    
$txt_body_number = $_GET["search"];
}
$txt_full_name = "";
$txt_route = "";
$txt_date_of_expiry = "";
$txt_date_received = "";
$txt_resolution_number = "";
$txt_date_released = "";
$txt_status = "";
$txt_latest_transaction = "";

if (@$_GET["action"] == "update"){
	$sql_cat = "SELECT  body_number, names, route, date_of_expiry, date_received, date_released, resolution_number, status, latest_transaction
                FROM mtop_masterlist_2024
                WHERE body_number = ?";

    if ($cat_check = mysqli_prepare($conn, $sql_cat)){
        mysqli_stmt_bind_param($cat_check, "s", $body_number,);
        
        $body_number = $_GET['body_number'];

        mysqli_stmt_execute($cat_check);
        
        mysqli_stmt_bind_result($cat_check, $body_number, $names, $route, $date_of_expiry, $date_received, $date_released, $resolution_number, $status, $latest_transaction);
        while(mysqli_stmt_fetch($cat_check)){
			
            $txt_body_number = $body_number;
            $txt_full_name = $names;
            $txt_route = $route;
            $txt_date_of_expiry = $date_of_expiry;
            $txt_date_received = $date_received;
            $txt_date_released = $date_released;
            $txt_resolution_number = $resolution_number;
            $txt_status = $status;
            $txt_latest_transaction = $latest_transaction;



            
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
                <h3>Units</h3>
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


        
        <div class="col-sm-6">
        <div class="d-inline-flex col-12 p-2">
            <div class="form-group">
                                <label>Route *</label>   
                                <!-- <input value="<?php //echo $txt_route; ?>" type="text" id="route" class="form-control rounded" placeholder="Route" >  -->
                                 <select class="form-select" name="route" id="route">
                                 <option value="" disabled>No Route Assigned</option>
                                 <option value="SILAY CITY PROPER">SILAY CITY PROPER</option>
                                 <option value="BRGY. E. LOPEZ">BRGY. E. LOPEZ</option>
                                 <option value="BRGY. BAGTIC">BRGY. BAGTIC</option>
                                 <option value="BRGY. GUIMBALA-ON">BRGY. GUIMBALA-ON</option>
                                 <option value="BRGY. BALARING">BRGY. BALARING</option>
                                 <option value="BRGY. HAWAIIAN">BRGY. HAWAIIAN</option>
                                 <option value="BRGY. LANTAD">BRGY. LANTAD</option>
                                 <option value="CROSSING LUGUAY-MAMBAG-ID">CROSSING LUGUAY-MAMBAG-ID</option>
                                 <option value="LUGUAY - ADELA - BAGROY">LUGUAY - ADELA - BAGROY</option>
                                 <option value="GUIMBALAON PROPER & VICE VERSA">GUIMBALAON PROPER & VICE VERSA</option>

                                 </select>
                            <script> $('#route').val("<?php echo $txt_route; ?>"); </script>
            </div>
            </div>

                
            <div class="d-inline-flex align-bottom p-2 col-12">
                <button type="button" id="BtnSearchRoute" class="btn btn-warning btn-block d-inline">Search</button>
            </div>
        </div>

            
        </div>

        
        <div class="container p-3">

        <div class="row"> <!-- row 1 -->
            
            <div class="col-sm-2 ">
                <div class="form-group">
                                    <label>Status *</label>  
                                    <!-- <input value="<?php //echo $txt_route; ?>" type="text" id="route" class="form-control rounded" placeholder="Route" >  -->
                                     <select class="form-select" name="status" id="status">
                                     <option value="UPDATED">UPDATED</option>
                                     <option value="EXPIRED">EXPIRED</option>
    
                                     </select>
                                <script> $('#status').val("<?php echo $txt_status; ?>"); </script>
                                
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                                    <label>Resolution Number *</label>   
                                    <input value="<?php echo $txt_resolution_number; ?>" type="text" id="resolution_number" class="form-control rounded" placeholder="Resolution Number" > 
                                
                </div>
            </div>
        
            <div class="col-sm-2 ">
                <div class="form-group">
                                    <label>Date Received</label>   
                                    <input value="<?php echo $txt_date_received; ?>" type="text" id="date_received" class="form-control rounded" placeholder="Date Received" > 
                                
                </div>
            </div>
        
            <div class="col-sm-2 ">
                <div class="form-group">
                                    <label>Date Released</label>   
                                    <input value="<?php echo $txt_date_released; ?>" type="text" id="date_released" class="form-control rounded" placeholder="Date Released" > 
                                
                </div>
            </div>
            
            <div class="col-sm-2 ">
                <div class="form-group">
                                    <label>Date of Expiry</label>   
                                    <input value="<?php echo $txt_date_of_expiry; ?>" type="text" id="date_of_expiry" class="form-control rounded" placeholder="Date of Expiry" > 
                                
                </div>
            </div>

        </div>
        
        <div class="col-sm-5 ">
            <div class="form-group">
                                <label>Latest Transaction</label>   
                                <input value="<?php echo $txt_latest_transaction; ?>" type="text" id="latest_transaction" class="form-control rounded" placeholder="Last Transaction" > 
                            
            </div>
        </div>

        </div>

            
        <div class="row p-3">
            <div class="col-sm-3">
                <div class="form-group">
					<input type="hidden" value="<?php echo $txt_id; ?>" id="body_number" >
                    <button type="button" id="BtnAddUnit" class="btn btn-warning btn-block">Save Record</button>
                                    
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
							<td width= "15%">Full Name</td>
							<td width= "10%">Route</td>
							<td width= "10%">Date of Expiry</td>
							<td width= "10%">Resolution  Number</td>
							<td width= "10%">Date Received</td>
							<td width= "10%">Date Released</td>
							<td width= "10%">Status</td>
							<td width= "10%">Latest Transaction</td>
						</tr>
					</thead>
                    
					<tbody>
                        
						<?php $ctr = 0; ?>
						<?php 
                        if (isset($_GET["search"])&& $_GET["term"]=== "body_number"){
                            $sql_unit = "SELECT body_number, names, route, date_of_expiry, date_received, date_released, resolution_number, status, latest_transaction
						                 FROM mtop_masterlist_2024 WHERE body_number = '".$_GET["search"]."'";
                         } 
                        elseif (isset($_GET["search"])&& $_GET["term"]=== "names"){
                             $sql_unit = "SELECT body_number, names, route, date_of_expiry, date_received, date_released, resolution_number, status, latest_transaction
                                          FROM mtop_masterlist_2024 WHERE names = '".$_GET["search"]."'";
                          } 
                        elseif (isset($_GET["search"])&& $_GET["term"]=== "route"){
                             $sql_unit = "SELECT body_number, names, route, date_of_expiry, date_received, date_released, resolution_number, status, latest_transaction
                                          FROM mtop_masterlist_2024 WHERE route = '".$_GET["search"]."'";
                          } else{
                            $sql_unit = "SELECT body_number, names, route, date_of_expiry, date_received, date_released, resolution_number, status, latest_transaction
                                         FROM mtop_masterlist_2024" ;

                                        // echo $sql_unit; //debugging show sql
                         }
                         
                         
                         
                         ?>

                        
						<?php $qry_unit = mysqli_query($conn, $sql_unit); ?>
						<?php while($get_unit = mysqli_fetch_array($qry_unit)){ ?>
						<?php $ctr++; ?>
						<tr>
							<td> <a href="update.php?action=update&body_number=<?php echo $get_unit["body_number"]; ?>"> 
							Update</a> /
							<a onclick="return confirm('Are you sure?')" href="process.units.php?action=delete&body_number=<?php echo $get_unit["body_number"]; ?>">
							Delete</a>
							</td>
							<td><?php echo $get_unit["body_number"]?></td>
							<td ><?php echo $get_unit["names"] ?></td>
							<td 

							<?php 

							switch ($get_unit["route"]) {
								case "BRGY. E. LOPEZ":
									echo "style = \"background-color: #c00000; color: white \"";
									break;
								case "BRGY. BAGTIC":
									echo "style = \"background-color: #375623;  color: white \"";
									break;
                                    case "BRGY. GUIMBALA-ON ":
                                        echo "style = \"background-color: #92d050;  color: white \"";
                                        break;
                                    case "BRGY. BALARING":
                                        echo "style = \"background-color: #0066ff;  color: white \"";
                                        break;
                                    case "BRGY. HAWAIIAN":
                                        echo "style = \"background-color: #ffc000;  color: black \"";
                                        break;
                                    case "BRGY. LANTAD":
                                        echo "style = \"background-color: #ff6600;  color: white \"";
                                        break;
                                    case "CROSSING LUGUAY-MAMBAG-ID":
                                        echo "style = \"background-color: #663300;  color: white \"";
                                        break;
                                    case "LUGUAY - ADELA - BAGROY":
                                        echo "style = \"background-color: #ff99cc;  color: black \"";
                                        break;
                                    case "GUIMBALAON PROPER & VICE VERSA":
                                        echo "style = \"background-color: #9966ff;  color: white \"";
                                        break;
                                    case "SILAY CITY PROPER":
                                        
                                        break;
								default:
							}
							
							
							?>
                            
                            ><?php echo $get_unit["route"] ?></td>
							<td><?php echo $get_unit["date_of_expiry"] ?></td>
							<td><?php echo $get_unit["resolution_number"] ?></td>
							<td><?php echo $get_unit["date_received"] ?></td>
							<td><?php echo $get_unit["date_released"] ?></td>
							<td 
                            <?php switch ($get_unit["status"]) {
                                case "EXPIRED": echo"class = \"bg-danger\"";
                                break;
                                default: echo"class = \"bg-warning\"";

                            }?>
                            
                            ><?php echo $get_unit["status"] ?></td>
							<td 
                            <?php 
                            
                            if (str_starts_with($get_unit["latest_transaction"],"CU")) { 
                                echo "style = \"background-color: #375623;  color: white \"";
                            }
                            elseif (str_starts_with($get_unit["latest_transaction"],"CN")) { 
                                echo "style = \"background-color: #ffc000;  color: white \"";
                            }
                            elseif ($get_unit["latest_transaction"]== "RENEWAL") { 
                                echo "style = \"background-color: #c00000;  color: white \"";
                            }
                            elseif (str_starts_with($get_unit["latest_transaction"],"NEW APPLICANT")) { 
                                echo "style = \"background-color: #db8644;  color: white \"";
                            }
                            elseif ($get_unit["latest_transaction"]== null) { 
                                echo "style = \"background-color: #ffffff;  color: white \"";
                            }else{ echo "style = \"background-color: #002060;  color: white \"";

                            }
                            
                            ?>><?php echo $get_unit["latest_transaction"] ?></td>
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
            

                var txt_body_number = $("#body_number").val();
                var txt_resolution_number = $("#resolution_number").val();
                var txt_date_of_expiry = $("#date_of_expiry").val();
                var txt_full_name = $("#full_name").val();
                var txt_date_received = $("#date_received").val();
                var txt_date_released = $("#date_released").val();
                var txt_route = $("#route").val();
                var txt_status = $("#status").val();
                var txt_latest_transaction = $("#latest_transaction").val();
                
                


                if (txt_body_number == null || txt_body_number == "") {
                    alert(alertNotice);
                    $("#body_number").focus();
                }
                

                else {
                    
                    $.post("process.units.php", {
                        body_number: txt_body_number,
                        resolution_number: txt_resolution_number,
                        date_of_expiry: txt_date_of_expiry,
                        names: txt_full_name,
                        date_received: txt_date_received,
                        date_released: txt_date_released,
                        route: txt_route,
                        status: txt_status,
                        latest_transaction: txt_latest_transaction
                        

                    }, function(data,status) {
                        
						if(status == "success"){
                        window.location = "update.php";
						}
                    })
                }
            });


            $("#BtnSearchBodyNumber").on("click", function() {
                var txt_body_number = $("#body_number").val();
                let pagelink = "update.php";
                
                let result = pagelink.concat("?search=",txt_body_number);
                result = result.concat("&term=body_number")
               
                
                window.location = result;



            });
            $("#BtnSearchName").on("click", function() {
                var txt_full_name = $("#full_name").val();
                let pagelink = "update.php";
                
                let result = pagelink.concat("?search=",txt_full_name);
                result = result.concat("&term=names")
               
                
                window.location = result;



            });
            $("#BtnSearchRoute").on("click", function() {
                var txt_route = $("#route").val();
                let pagelink = "update.php";
                
                let result = pagelink.concat("?search=",txt_route);
                result = result.concat("&term=route")
               
                
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
