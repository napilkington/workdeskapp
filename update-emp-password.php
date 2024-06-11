<?php
session_start();
include ('include/conn.php');
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.html"); 
}

if(isset($_POST['submit']))
	{	$oldpwd=$_POST['oldpwd'];
		$newpwd=$_POST['newpwd'];
		$conpwd=$_POST['conpwd'];

		$sql="select password from user_login where id LIKE '".$id ."'";
		$check=mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($check);
		if ($oldpwd == $row[0])
		{
			if ($newpwd == $conpwd)
			{
				$result=mysqli_query($conn,"select password from user_login where password='$newpwd'");
				if(mysqli_num_rows($result)>0)
				{
					?>
					<script type="text/javascript">
					alert("La contraseña ya existe en la base de datos, por favor ingrese una nueva contraseña.")
					</script>
					<?php

				}
				else
				{
				$update=mysqli_query($conn,"update user_login set password ='$newpwd' where id='$id'");
					?>
				<script type="text/javascript">
				alert("Contraseña actualizada con éxito.")
				</script>
				<?php
				}	
				

			}
			else 
			{
			?>
			<script type="text/javascript">
			alert("Las contraseñas no coinciden.")
			</script>
			<?php
			}

		}
		else
		{
			?>
		<script type="text/javascript">
			alert("¡Su antigua contraseña es incorrecta!")
		</script>
		<?php
		}
	}


include "include/header.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Cambiar contraseña</title>
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
          Cambiar contraseña
    </div>

    <div class="inputform">
    <form method="post" class="container">
  <div class="form-group">
    <label >Contraseña antigua:</label>
    <input type="password" name="oldpwd" class="form-control" placeholder="Introduce Contraseña antigua" required oninvalid="this.setCustomValidity('Por favor, introduce tu antigua contraseña.')" oninput="this.setCustomValidity('')" >
  </div>
  <div class="form-group">
    <label >Contraseña nueva:</label>
    <input type="password" class="form-control" name="newpwd" placeholder="Introduce Contraseña nueva" required oninvalid="this.setCustomValidity('Por favor, introduce una contraseña nueva.')" oninput="this.setCustomValidity('')" >
  </div>
<div class="form-group">
    <label >Confirma Contraseña:</label>
    <input type="password" class="form-control" name="conpwd" placeholder="Confirma Contraseña" required oninvalid="this.setCustomValidity('Por favor, confirma tu nueva contraseña.')" oninput="this.setCustomValidity('')">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Cambiar</button>&nbsp;&nbsp;
  <button type="reset"  class="btn btn-warning">Borrar</button>
</form>
</div>

	
</body>
</html>