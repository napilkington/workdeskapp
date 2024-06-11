<?php
session_start();
include ('include/conn.php');
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location:index.html"); 
}

include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Ver Permiso</title>
  <style type="text/css">
    /* *{box-sizing: border-box;}
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
  } */

  body {
            font-family: Arial, sans-serif;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
 
        .table {
            /* width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left; */
            margin:0% 1% ;
            width: 98%;
            border: 1px solid #bbb;
        }
        .table thead {
            background-color: #009aEE;
            color: #fff;
        }
        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        .table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .table tbody tr:nth-of-type(odd) {
            background-color: #fff;
        }
        th, td {
            text-align: center;
        }
        .alert {
            margin: 20px;
            padding: 10px;
            /* background-color: #f8d7da; */
            /* color: #721c24; */
            /* border: 1px solid #f5c6cb; */
            border-radius: 5px;
            text-align: left;
        }

        .buttons-container {
            margin: 20px;
            display: flex;
            justify-content: flex-start;
        }
        .buttons-container button {
            padding: 5px;
            font-size: 16px;
            margin-right: 12px;           
            cursor: pointer;
        }


        @media only screen and (max-width: 1024px) {
            .table thead {
                display: none;
            }
            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }

  </style>

  <!-- Include jsPDF and jsPDF-AutoTable libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
    <script>
        function printTable() {
            window.print();
        }

        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.autoTable({
                head: [['No.', 'Nombre Usuario', 'Email_ID', 'Fecha', 'Acción']],
                body: Array.from(document.querySelectorAll('.table tbody tr')).map(row => {
                    return Array.from(row.querySelectorAll('td')).map(cell => cell.innerText);
                })
            });

            doc.save('permisos.pdf');
        }
    </script>

</head>
<body>
  <div class="alert alert-primary" role="alert" style="">Ver Permisos</div>
  <div class="buttons-container">
        <button onclick="printTable()">Imprimir</button>
        <button onclick="downloadPDF()">Descargar PDF</button>
    </div>
  <div class="table-container">
  <table class="table">
  <thead class="thead-dark">
    <tr>
        <th style="text-align: center;">No.</th>
        <th style="text-align: center;">Fecha Inicio Permiso</th>
        <th style="text-align: center;">Fecha Fin Permiso</th>
        <th style="text-align: center;">Descripción</th>
        <th style="text-align: center;">Estado</th>
    </tr>
  </thead>
  <tbody>
     <?php
        $select_query = mysqli_query($conn, "select * from leave_tbl where user_id='$id'");
        $sn = 1;
        while($row = mysqli_fetch_array($select_query))
        { 
            $startdate = date('d M Y', strtotime($row['start_date']));
            $enddate = date('d M Y', strtotime($row['end_date']));
                      //$leavedate = date('d M Y', strtotime($row['leave_date']));
                     //$timeperiod = $row['time_period'];
       ?>
    <tr>
          <td data-label="No."><?php echo $sn; ?></td>
          <td data-label= "Fecha Inicio"><?php echo $startdate;?></td>
          <td data-label= "Fecha Fin"><?php echo $enddate; ?></td>
          <td data-label= "Descripción" ><?php echo  $row['description']; ?></td>

          <td data-label="Estado">
        <?php 
        if ($row['status'] == 0) {
            echo "<span style='color:blue'>Pendiente</span>";
        } elseif ($row['status'] == 1) {
            echo "<span style='color:green'>Aprobado</span>";
        } else {
            echo "<span style='color:red'>Rechazado</span>";
        }
        ?>
    </td>
          


        </tr>
        <?php $sn++; } ?>
  </tbody>
</table>
</div>

</body>
</html>
          
  <!-- <table width="100%" cellspacing="0" border="1">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Leave Start Date</th>
        <th>Leave End Date</th>
        <th>Description</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_query = mysqli_query($conn, "select * from leave_tbl where user_id='$id'");
        $sn = 1;
        while($row = mysqli_fetch_array($select_query))
        { 
            $startdate = date('d M Y', strtotime($row['start_date']));
            $enddate = date('d M Y', strtotime($row['end_date']));
                      //$leavedate = date('d M Y', strtotime($row['leave_date']));
                     //$timeperiod = $row['time_period'];
       ?>
        <tr>
          <td  style="text-align: center"><?php echo $sn; ?></td>
          <td  style="text-align: center"><?php echo $startdate;?></td>
          <td  style="text-align: center"><?php echo $enddate; ?></td>
          <td  style="text-align: center"><?php echo  $row['description']; ?></td>
          <?php
          if($row['status']==0)
          { ?>
          <td style="color:blue;font-weight: 700;text-align: center">Pending</td>
          <?php }
          else if($row['status']==1)
          { ?>
          <td style="color:green;font-weight: 700;text-align: center">Approved</td>
          <?php  }
          else 
          { ?>
          <td style="color:red;font-weight: 700;text-align: center">Rejected</td>
          <?php  } ?>
        </tr>
        <?php $sn++; } ?>
    </tbody>
  </table>
 -->