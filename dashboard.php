<?php

include("admin.header.php");
if(!file_exists("connect.php")){
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("connect.php");
?>

<div class="container my-1 border">
    <div class="row">
        <div class="col-sm-12 "><?php include("navigation.php") ?></div>
    </div>
</div>
<div class="container border">
    <div class="row p-2">
        <div class="col-sm-12 ">
		
            <h3>Mixed List</h3>
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
							<td width= "15%">Motor Number/td>
							<td width= "10%">Chasis  Number</td>
							<td width= "20%">Route</td>
							<td width= "10%">Date of Expiry</td>
						</tr>
					</thead>
					<tbody>
						<?php $ctr = 0; ?>
						<?php $sql_category = "
						SELECT 
							ml.body_number, ml.names, ml.route, ml.date_of_expiry, it.motor_number, it.chasis_number
						FROM mtop_masterlist_2024 AS ml
						JOIN
							individual_transaction AS it ON ml.body_number = it.body_number
							" ?>
						<?php $qry_category = mysqli_query($conn, $sql_category); ?>
						<?php while($get_category = mysqli_fetch_array($qry_category)){ ?>
						<?php $ctr++; ?>
						<tr>
							<td> <a href="update.php?action=update&body_number=<?php echo $get_category["body_number"]; ?>"> 
							Update</a> /
							<a href="process.reject.php?action=reject&transaction_ID=<?php echo $get_category["body_number"]; ?>">
							Delete</a>
							</td>
							<td><?php echo $get_category["body_number"]?></td>
							<td><?php echo $get_category["names"] ?></td>
							<td><?php echo $get_category["motor_number"] ?></td>
							<td><?php echo $get_category["chasis_number"] ?></td>
							<td class = "BAGTIC"><?php echo $get_category["route"] ?></td>
							<td class="text-end elopez"><?php echo $get_category["date_of_expiry"] ?></td>
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



<?php
include("admin.footer.php");
