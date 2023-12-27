<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services List</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>

<style>
    .img-thumb-path {
        width: 100px;
        height: 80px;
        object-fit: scale-down;
        object-position: center center;
    }
</style>

<div class="card card-outline card-primary rounded-0 shadow">
    <div class="card-header">
        <h3 class="card-title">List of Pet</h3>
        <div class="card-tools">
            <a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary">
                <span class="fas fa-plus"></span> Add New Pet
            </a>
            <button onclick="generatePDF()" class="btn btn-flat btn-sm btn-primary">
                <span class="fas fa-print"></span> Print as PDF
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table id="servicesTable" class="table table-hover table-striped">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="25%">
                    <col width="25%">
                    <col width="10%">
                    <col width="15%">
                </colgroup>
                <thead>
					<tr>
                        <th>#</th>
                        <th>Pet Breed</th>
                        <th>med_amount </th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming you have a database connection established
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "ovas_db";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to select all rows from the stock_list table
                    $sql = "SELECT * FROM pet_details";
                    $result = $conn->query($sql);

                    // Check if there are rows in the result set
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['pet breed'] ?></td>
                                <td><?php echo $row['med_amount'] ?></td>
                                <td><?php echo $row['date_created'] ?></td>

                                <td align="center">
                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Action
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        // No rows found
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function generatePDF() {
    // Create a new jsPDF instance
    var doc = new jsPDF();

    // Add content to the PDF
    doc.text('List of Services', 20, 10);
    doc.autoTable({
        html: '#servicesTable',
        startY: 20,
    });

    // Save the PDF
    doc.save('services_list.pdf');
}
</script>

</body>
</html>




<script>
	$(document).ready(function(){
        $('#create_new').click(function(){
			uni_modal("Add New Pet","pet/manage_stock.php",'mid-large')
		})
        $('.edit_data').click(function(){
			uni_modal("Med Amount","pet/manage_stock.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Service permanently?","delete_service",[$(this).attr('data-id')])
		})
		$('.view_data').click(function(){
			uni_modal("Service Details","services/view_stock.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 4 }
            ],
        });
	})
	function delete_service($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_service",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>




