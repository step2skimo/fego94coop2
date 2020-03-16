<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['at']!=="ADMIN"){
	header('location:index.php');
	$errorMsg = "Access denied, login now to gain access";
} else{
		header("Content-Type: text/html; charset= utf-8");
}
include("../conn.php");
include ("welcome.php"); 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=".">
<meta name="keywords" content="">
<meta name="robots" content="index" />
<title>Admin Panel | Employeee Cooperative Management System</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="../css/refresh.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!--Scripts-->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</head>
<body>
<!--Conatiner-->
<div class="container">

<?php include 'admin-header.php'; ?>
<div class="row">
	<div class="col-md-3">
		<div class="panel">
			<div class="panel-heading bg-purple"><strong>Admin Menu</strong></div>
			<div class="panel-body cst-panel-body">
				<?php include 'admin-side-menu.php'; ?>
			</div>
		</div>

	</div>
	<div class="col-md-9">
		<div class="panel">
			<div class="panel-heading bg-purple"><strong>Status</strong></div>
			<div class="panel-body cst-panel-body">
								<a href="javascript:window.print()" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print</a>
				<?php 
			if($result = $con->query("SELECT * FROM loan_table ")){
				if($result->num_rows > 0){
					echo "<table class='table table-condensed table-hover table-bordered'>";
					echo "<thead><tr><th>Amount</th><th>Date</th></tr></thead>";
					echo "<tbody>";
					while($row = $result->fetch_object()){
						//set up row for each record
						echo "<tr>";
						echo "<td>". "₦".$row->loan_amount . "</td>";
						echo "<td>". $row->loan_date . "</td>";
						  
						 
					}
					echo "</tbody>";
					echo "</table>";

				}else{echo "You have not requested for any loans";}
			}
			?>
			


			</div>
		</div>

	</div>
	
</div>
<?php include '../footer.php'; ?>
</div>




</body>
</html>