<?php
session_start();
include ('../include/conn.php');

$viewid=$_GET['viewid'];
$result=mysqli_query($conn,"select * from profile_tbl where email='$viewid'");
if($row=mysqli_fetch_row($result))
{ $user_name=$row[1];
	$f_name=$row[2];
	$l_name=$row[3];
  $email=$row[4];
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
        background-color: #cfcfcf;
        font-size: 21px;
        margin:0% 1% ;
        width: 98%;
        border-radius: 8px;
    }
    .container
    {
        padding:50px 0px;
    }
    table tr td
    {
    	padding-top: 10px;
    }

	 /*MEDIA QUERIES*/	
	 @media (max-width: 768px) {
		
		.inputform{
			
			width: 90%;
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
	<div class="alert alert-primary" role="alert">Cambiar / Ver Perfil</div>
	<div class="inputform">
		<form method="post" class="container">
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Nombre Usuario:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="username" value="<?php echo $user_name?>" readonly = "true" />
    			</div>
  			</div>

  			<div class="form-group row">
    			<label for="inputPassword" class="col-sm-2 col-form-label">Nombre:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="f_name" value="<?php echo $f_name;?>" readonly = "true" />
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Apellidos:</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="l_name" value="<?php echo $l_name;?>"  readonly = "true">
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Email :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" readonly = "true" />
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Num. Contacto :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" readonly = "true" >
    			</div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Género:</label>
    			<div class="col-sm-10">
    				<div class="form-check form-check-inline">
              <input type="text" name="gender" class="form-control"  value="
              <?php 
              switch($gender)
              {
                case "Masculino";
                echo "Masculino";
                break;
                case "Femenino";
                echo "Femenino";
                break;
                case "Otro";
                echo "Otro";
                break;
              }
              ?>">
					</div>
    			</div>
  			</div>


  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Edad :</label>
    			<div class="col-sm-10">
				<input type="number" class="form-control" name="age" value="<?php echo $age;?>" readonly = "true" />
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Fecha de Nac. :</label>
    			<div class="col-sm-10">
    				<input type="date" class="form-control" name="dob" value="<?php echo $dob;?>" readonly = "true" >
    			</div>
  			</div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Salario :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="salary" value="<?php echo $salary;?>" readonly = "true" >
    			</div>
  			</div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Dirección :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>" readonly = "true" />
          </div>
        </div>
  			
  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label">Código Pin :</label>
    			<div class="col-sm-10">
    				<input type="text" class="form-control" name="pincode" value="<?php echo $pincode;?>"  readonly = "true" />
    			</div>
  			</div>

  			<div class="form-group-row-btn">
    			<input type="submit" class="btn btn-warning" name="submit" value="Regresar">
  			</div>
        <?php if(isset($_POST['submit']))
         echo "<script>window.location.href='view-employee.php'</script>";
        ?>

    	</form>
	</div>

</body>
</html>