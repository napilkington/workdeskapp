<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location: ../index.html"); 
}

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver tareas</title>
    <style type="text/css">
        .table
        {  
        margin:0% 1% ;
        width: 98%;
        border: 1px solid #bbb;
        }
        .alert
        {
        margin-left: 10px;
        margin-right:10px;
        }
        th,tr{text-align: center}

        /* MEDIA QUERY */

        @media only screen and (max-width: 768px) {
            
        }

    </style>
</head>
<body>
    <div class="alert alert-primary" role="alert" style="">Ver tareas</div>
    <div class="tbl">
    <table class="table">
        <thead class="thead-dark">
            <tr>
             <th scope="col">No.</th>
            <th scope="col">Título</th>
            <th scope="col">Descripción</th>
            <th scope="col">Asignado a</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Entrega</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha Enviada</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_query = mysqli_query($conn, "select work_tbl.*,user_login.username from work_tbl INNER JOIN 
              user_login ON user_login.id = work_tbl.user_id");
            $sn = 1;
            while($row = mysqli_fetch_array($select_query))
            { 
            ?>
            <tr>
                <td ><?php echo $sn; ?></td>

                <td ><?php echo $row['title']; ?></td>
                
                <td ><?php echo $row['description']; ?></td>

                <td ><?php echo $row['username']; ?></td>

                <td ><?php echo $row['startdate']; ?></td>

                <td ><?php echo $row['duedate']; ?></td>

                <td ><?php if($row['status']==0){echo "<span style='color:red'>Incompleta</span>";} else{echo "<span style='color:green'>Completa</span>";}?></td>

                 <td ><?php if($row['status']==0){echo "-";} else{echo $row['enddate'] ;}?></td>
            </tr>
            <?php $sn++; } ?>                                                   
        </tbody>
    </table>        
</div>
</body>
</html>