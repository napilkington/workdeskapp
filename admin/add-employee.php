<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location: ../index.html"); 
}

if(isset($_POST['submit']))
{
	$username = $_POST['username'];	
	$emailid = $_POST['emailid'];
	$pwd = $_POST['pwd'];
	$sql="select * from user_login where email LIKE '".$emailid ."' or password
	LIKE'".$pwd."'";
	$check=mysqli_query($conn,$sql);
	if(mysqli_num_rows($check)==0)
	{

	$insert_employee = mysqli_query($conn,"insert into user_login set username='".$username."',email='".$emailid."', password='".$pwd."'");
	$insert_profile=mysqli_query($conn,"insert into profile_tbl set user_name='".$username."',email='".$emailid."', password='".$pwd."' ,status=0"); 

	if($insert_employee > 0 OR $insert_profile > 0)
	{
		?>
		<script type="text/javascript">
			alert("Empleado añadido con éxito.")
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Error al añadir empleado.")
		</script>
		<?php

	}

	}
	else
	{
		?>
		<script type="text/javascript">
			alert("¡El email ya existe!")
		</script>
		<?php
	}


}

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Añadir empleado</title>
<style type="text/css">
	.alert
        {
            margin-left: 10px;
            margin-right:10px;
        }
    .inputform
    {
        background-color: #ddd;
        font-size: 21px;
        margin:0% 1% ;
        width: 98%;
        border-radius: 8px;
    }
    .container
    {
        padding:50px 0px;
    }

	.btn{
		padding: 5px 15px;
	}

	/*MEDIA QUERY*/

	@media (max-width: 768px) {
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .form-group {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .form-group label {
        width: 100%;
        margin-bottom: 5px;
        text-align: left;
        font-size: 18px; /* Adjust font size if needed */
    }

    .form-group input {
        width: 100%;
        font-size: 18px; /* Adjust font size if needed */
        padding: 10px;
        margin-bottom: 10px;
    }

    .btn {
        width: 40%;
        font-size: 18px;       
        padding: 5px;
    }
}





</style>
</head>
<body>
	<div class="alert alert-primary" role="alert" style="">
	Añadir empleado
    </div>

	<div class="inputform">
    <form method="post" class="container">
  <div class="form-group">
    <label >Introduce Nombre Empleado:</label>
    <input type="text" name="username" class="form-control" placeholder="Nombre Empleado" required oninvalid="this.setCustomValidity('Por favor, introduce un nombre de empleado.')" oninput="this.setCustomValidity('')">
  </div>
  <div class="form-group">
    <label >Introduce Email:</label>
    <input type="email" class="form-control" name="emailid" placeholder="Email" required oninvalid="this.setCustomValidity('Por favor, introduce una dirección de correo válida.')" oninput="this.setCustomValidity('')"/>
  </div>
<div class="form-group">
    <label >Introduce contraseña:</label>
    <input type="password" class="form-control" name="pwd" placeholder="Contraseña" required oninvalid="this.setCustomValidity('Por favor, introduce una contraseña válida.')" oninput="this.setCustomValidity('')"/>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Añadir</button>&nbsp;&nbsp;
  <button type="reset"  class="btn btn-warning">Borrar</button>
</form>
</div>

	
</body>
</html>	

	<!-- <form method="post" action="add-employee.php">
	
		<input type="text" name="username" id="firstname" placeholder="Enter First Name" required="required">
			
		<input type="text" name="emailid" id="emailid" placeholder="Enter EmailId"	required="required" >
	
		<input type="password" name="pwd" id="pwd" placeholder="Enter Password" required="required">
			
		<input type="submit" name="submit"/>	

		</div>
	</form> -->