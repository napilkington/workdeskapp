<?php
require('../include/conn.php');
session_start();
if (!isset($_SESSION['IS_ELOGIN'])) 
{
header('location:../index.html');
}
$total_work=mysqli_query($conn,"select count(*) from work_tbl");
$total_work = mysqli_fetch_row($total_work);

$submitted_work=mysqli_query($conn,"select count(*) from work_tbl where status=1");
$submitted_work = mysqli_fetch_row($submitted_work);

$pending_work=mysqli_query($conn,"select count(*) from work_tbl where status=0");
$pending_work = mysqli_fetch_row($pending_work);

$select_employee = mysqli_query($conn,"select count(*) from user_login where status=0");
$total_emp = mysqli_fetch_row($select_employee);

$total_leave = mysqli_query($conn,"select count(*) from leave_tbl");
$total_leave = mysqli_fetch_row($total_leave);

$pending_leave = mysqli_query($conn,"select count(*) from leave_tbl where status=0");
$pending_leave = mysqli_fetch_row($pending_leave);


include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<style type="text/css">
		.card
		{
			display: inline-block;
			width: 29%;
			margin-left:17px;
			border:1px solid #888;
		}
		.card-header{border-bottom:1px solid #888;background-color: #ccc;}
		.container a
		{
			color: black;
			text-decoration: none;
		}

		/* MEDIA QUERIES */

        @media only screen and (max-width: 1024px) {
            .container {
				display: flex;
                flex-direction: column;
                align-items: center;
            }
            .card {
                width: 300px; /* Fixed width for the cards */
                margin-left: 0;
                margin-bottom: 20px; /* Adds space between cards */
            }
        }

		@media only screen and (min-width: 768px) and (max-width: 1024px) { 
			.container {
				display: flex;
                flex-direction: column;
                align-items: center;
            }
            .card {
                width: 400px; /* Fixed width for the cards */
                margin-left: 0;
                margin-bottom: 20px; /* Adds space between cards */
            }
		}


	</style>
</head>
<body >

	 <div class="container">
	 	<a href="view-task.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-briefcase"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Total Tareas</h5>
  			  <h1><?php echo $total_work[0];?></h1>
    		</div>
		</div>
		</a>

	 	<a href="view-task.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-check-square-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Tareas Enviadas</h5>
  			  <h1><?php echo $submitted_work[0];?></h1>
    		</div>
		</div>
		</a>

	 	<a href="view-task.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-clock-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Tareas Pendientes</h5>
  			  <h1><?php echo $pending_work[0];?></h1>
    		</div>
		</div>
		</a>

	 	<a href="view-employee.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-user"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Total Empleados</h5>
  			  <h1><?php echo $total_emp[0];?></h1>
    		</div>
		</div>
		</a>


		<a href="manage-leave.php">
		<div class="card text-bg-light mb-3 box" >
  			<div class="card-header"><h1><i class="fa fa-calendar-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Total Permisos</h5>
  			  <h1><?php echo $total_leave[0];?></h1>
    		</div>
		</div>
		</a>

		<a href="manage-leave.php">
		<div class="card text-bg-light mb-3 box" >
  			<div class="card-header"><h1><i class="fa fa-calendar-minus-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Permisos Pendientes</h5>
  			  <h1><?php echo $pending_leave[0];?></h1>
    		</div>
		</div>
		</a>
	</div>
</body>
</html>