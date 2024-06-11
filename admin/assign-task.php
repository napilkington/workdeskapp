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
	$title=$_POST['title'];
	$description=$_POST['description'];
	$assignto=$_POST['assignto'];
	$startdate=$_POST['startdate'];
	$duedate=$_POST['duedate'];

	$result=mysqli_query($conn,"insert into work_tbl set user_id='$assignto',title='$title',description='$description',startdate='$startdate',duedate='$duedate',status=0");
  ?>
  <script type="text/javascript">
    alert("Tarea añadida con éxito")
  </script>
  <?php

}

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Asignar Tarea</title>
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
        margin:0% 1%;
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
	<div class="alert alert-primary" role="alert" style="">Asignar Tarea</div>

	<div class="inputform">
    <form method="post" class="container" onsubmit="return validarFechas()">
  <div class="form-group">
    <label >Título :</label>
    <input type="text" name="title" class="form-control" placeholder="Título Tarea" required oninvalid="this.setCustomValidity('Por favor, introduce un título.')" oninput="this.setCustomValidity('')">
  </div>
  <div class="form-group">
    <label >Descripción :</label>
    <input type="text" class="form-control" name="description" placeholder=" Descripción Tarea" required oninvalid="this.setCustomValidity('Por favor, introduce una descripción.')" oninput="this.setCustomValidity('')">
  </div>

  <div class="form-group">
    <label >Asignado a:</label>
    <?php $sql=mysqli_query($conn,"select id,username from user_login where status=0");?>	
  	<select class="form-select form-control" name="assignto">
  		<option value="">Seleccionar Empleado...</option>
      <?php while($row = mysqli_fetch_array($sql))
      {
        echo "<option value='".$row['id']."'>".$row['username']."</option>";

      }?>



    	<!-- <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option> -->
	</select>
  </div>
<div class="form-group">
    <label >Fecha Inicio:</label>
    <input type="date" class="form-control" name="startdate" required oninvalid="this.setCustomValidity('Por favor, introduce una fecha de inicio.')" oninput="this.setCustomValidity('')">
  </div>
<div class="form-group">
    <label >Fecha Entrega:</label>
    <input type="date" class="form-control" name="duedate" required oninvalid="this.setCustomValidity('Por favor, introduce una fecha de entrega.')" oninput="this.setCustomValidity('')">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Añadir</button>&nbsp;&nbsp;
  <button type="reset"  class="btn btn-warning">Borrar</button>
</form>
</div>

<script type="text/javascript">
    function validarFechas() {
        var startDate = new Date(document.getElementsByName("startdate")[0].value);
        var dueDate = new Date(document.getElementsByName("duedate")[0].value);
        
        if (dueDate <= startDate) {
            alert("La fecha de entrega debe ser posterior a la fecha de inicio.");
            return false;
        }
        return true;
    }
</script>


	
</body>
</html>	