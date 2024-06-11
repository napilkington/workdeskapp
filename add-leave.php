<?php
session_start();
include ('include/conn.php');
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location: index.html"); 
}
if(isset($_POST['submit']))
{   $start_date;
    $end_date;
    if(!empty($_POST['start-date']))
    {  
       $start_date =$_POST['start-date'];
    }
    else 
    {
      ?>
    <script>
            alert("Por favor, introduce la fecha de inicio.");
        </script>
    
    <?php
        
    }    
    if(!empty($_POST['end-date']))
    {   
       $end_date = $_POST['end-date'];
    }
    else 
    {
        ?>
    <script>
            alert("Please, introduce la fecha de fin.");
        </script>
    
    <?php
      
    }   
    
    // $time_period=DATEDIFF($start_date,$end_date) ;
    
    $remark = $_POST['remarks'];

    $insert_leave = mysqli_query($conn,"insert into leave_tbl set user_id='$id',start_date='$start_date', end_date='$end_date', time_period='' , description='$remark'");
    if($insert_leave > 0)
    {
        ?>
<script type="text/javascript">
    alert("Permiso añadido con éxito.");
</script>
<?php
 echo "<script>window.location.href='user_dashbord.php'</script>";
}
}

include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="add-leave.css">
    <title>Apply a leave</title>
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
        margin-top: 15px;
    }
}



    </style>
</head>
<body>
    <div class="alert alert-primary" role="alert" style="">
            Solicitar Permiso
    </div>
    <div class="inputform">
    <form method="post" class="container" onsubmit="return validarFechas()">
  <div class="form-group">
    <label >Introduce Fecha Inicio:</label>
    <input type="date" class="form-control" name="start-date"required oninvalid="this.setCustomValidity('Por favor, introduce una fecha de inicio.')" oninput="this.setCustomValidity('')">
  </div>
  <div class="form-group">
    <label >Introduce Fecha Fin:</label>
    <input type="date" class="form-control" name="end-date" required oninvalid="this.setCustomValidity('Por favor, introduce una fecha de fin.')" oninput="this.setCustomValidity('')">
  </div>
  <div class="form-group">
    <label >Descripción:</label>
    <textarea name="remarks" class="form-control" rows="3" placeholder="Introduce descripción" required oninvalid="this.setCustomValidity('Por favor, introduce una descripción.')" oninput="this.setCustomValidity('')"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
</form>
</div>

<script type="text/javascript">
    function validarFechas() {
        var startDate = new Date(document.getElementsByName("start-date")[0].value);
        var dueDate = new Date(document.getElementsByName("end-date")[0].value);
        
        if (dueDate <= startDate) {
            alert("La fecha de finalización debe ser posterior a la fecha de inicio.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>