<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
$user_name=$_SESSION['euser_name'];
$email=$_SESSION['eemail'];
if(empty($id))
{
    header("Location: ../index.html"); 
}
if(isset($_POST['submit']))
{	$user_name=$_POST['username'];
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
    $salary=$_POST['salary'];

	$query=mysqli_query($conn, "update profile_tbl set user_name='$user_name', f_name='$f_name',l_name='$l_name', phone='$phone', gender='$gender', age='$age', dob='$dob', address='$address',pincode='$pincode',salary='$salary' where email='$email'");
	
    
		?>
		<script type="text/javascript">
			alert("Perfil actualizado con éxito.")
		</script>
		<?php
    	
 
}


$result=mysqli_query($conn,"select * from profile_tbl where email='$email'");
if($row=mysqli_fetch_row($result))
{
	$f_name=$row[2];
	$l_name=$row[3];
	$phone=$row[5];
	$gender=$row[6];
	$age=$row[7];
	$dob=$row[8];
	$address=$row[9];
	$pincode=$row[10];
  $salary=$row[13];
}  

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<style type="text/css">
	.alert
        {
            margin-left: 10px;
            margin-right:10px;
        }
     .btn
     {
     	width: 20%;
     	padding: 5px;
     	margin-right: 20px;
     	font-size: 20px;
     }
    .inputform
    {
        background-color: #ddd;
        font-size: 21px;
        margin:0% 1% ;
        width: 98%;
       
    }
    .container
    {
        padding:10px 10px;
		
    }
    table tr td
    {
    	padding-top: 10px;
    }

	/*MEDIA QUERIES*/	
	@media (max-width: 768px) {
		
		.inputform{
			
			width: 95%;
			margin: 0 auto;
		}
		
		.container{			
		display: flex;
		flex-direction: column;
        align-items: flex-start;
		}


    .form-group.row {
        display: flex;
		flex-direction: column;
        align-items: center;
		width: 100%;
		white-space: nowrap;
		
    }
    .form-group.row label {
       
        margin-bottom: 10px;
		
    }
    

	.form-group-row-btn{
		display: flex;
		flex-direction: column;
		align-items: center;
		width: 100%;
		padding-right: .5em;
		
	}

    .btn {
        width: 70%;
        margin-top: 1.3em;
        margin-right: 0;
		font-size: 18px;
    }
	.col-sm-2 {
        display: inline-block;
        font-size: 18px;
        width: 100%;
    }

	.form-check-inline{
		
		font-size: 18px;		
		text-align: center;
		margin: 0 0.2em;
		width: 50;
	}

	#genero {
        width: 100%;		
        display: flex;
        justify-content: center; /* Center-align the radio inputs */
    }


	}

	@media (min-width: 768px) and (max-width: 1024px) {
		.btn{
			width: 30%;
			margin-top: 1.3em;
        	margin-right: .5em;
		}
	}


</style>
</head>
<body>
	<div class="alert alert-primary" role="alert" style="">Ver/Cambiar Perfil</div>
	<div class="inputform">
		<form method="post" class="container">
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Nombre Usuario:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="username" value="<?php echo $user_name?>" readonly="true"/>
    			</div>
  			</div>

  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Nombre:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="f_name" value="<?php echo $f_name;?>" >
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Apellidos:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="l_name" value="<?php echo $l_name;?>" >
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Email:</label>
    			<div class="col-sm-10">
    				<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" readonly="true">
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Num. contacto:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Género:</label>
    			<div class="col-sm-10" id="genero">
    				<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Masculino" <?php if($gender== "Masculino"){?>checked="true"<?php }?>/>
 			 			<label class="form-check-label" for="inlineRadio1">Masculino</label>
					</div>

					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Femenino" <?php if($gender== "Femenino"){?>checked="true"<?php }?>/>
 			 			<label class="form-check-label" for="inlineRadio1">Femenino</label>
					</div>

					<div class="form-check form-check-inline">
  						<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Otro"  <?php if($gender== "Otro"){?>checked="true"<?php }?> />
 			 			<label class="form-check-label" for="inlineRadio1">Otro</label>
					</div>

    			</div>
  			</div>
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Edad:</label>
    			<div class="col-sm-10">    				
					<input type="number" class="form-control" name="age" value="<?php echo $age;?>" min="18" oninvalid="this.setCustomValidity('La edad no puede ser inferior a 18.')" oninput="this.setCustomValidity('')" />					
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Fecha de Nac:</label>
    			<div class="col-sm-10">
    				<input type="date" class="form-control" name="dob" value="<?php echo $dob;?>" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" oninvalid="this.setCustomValidity('La fecha de nacimiento debe tener una antiguedad mínima de 18 años.')" oninput="this.setCustomValidity('')" />
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Salario:</label>
    			<div class="col-sm-10">
    				<input type="number" class="form-control" name="salary" value="<?php echo $salary;?>" min = "1" oninvalid="this.setCustomValidity('El salario no puede ser 0.')" oninput="this.setCustomValidity('')" />
    			</div>
  			</div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Dirección:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>" >
          </div>
        </div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Código pin:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="pincode" value="<?php echo $pincode;?>" >
    			</div>
  			</div>

  			<div class="form-group-row-btn">
				<button type="submit" class="btn btn-primary" id="btn-top" name="submit">Cambiar Perfil</button>
				<input type="submit" class="btn btn-warning" name="updatepassword" value="Cambiar contraseña">
          <?php if(isset($_POST['updatepassword'])){echo "<script>window.location.href='update-password.php'</script>";}?>
  			</div>

    	</form>
	</div>

</body>
</html>