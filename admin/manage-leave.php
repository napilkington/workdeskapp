<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id))
{
    header("Location:../index.php"); 
}

include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gestión Permisos</title>
  <style type="text/css">
    body {
        font-family: Arial, sans-serif;
    }
    .table-container {
        width: 100%;
        overflow-x: auto;
    }
    .table {
        margin: 0% 1%;
        width: 98%;
        border: 1px solid #bbb;
        border-collapse: collapse;
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
        border-radius: 5px;
        text-align: left;
    }
    a button {
        padding: 4px;
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
            color: black; /* Ensuring the label color is black */
        }

        #aprobar{
            margin-bottom: 15px;
        }

         /* Ensuring "Acción" header is black */
    .table th:nth-child(6) {
        color: black;
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
   <div class="alert alert-primary" role="alert">Gestionar permisos</div>
   <div class="buttons-container">
        <button onclick="printTable()">Imprimir</button>
        <button onclick="downloadPDF()">Descargar PDF</button>
    </div>
    <div class="table-container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
             <th scope="col">No.</th>
            <th scope="col">Nombre Empleado</th>
            <th scope="col">Fecha Inicio Permiso</th>
            <th scope="col">Fecha Fin Permiso</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
      <?php
      $select_query = mysqli_query($conn, "SELECT leave_tbl.*, user_login.username FROM leave_tbl INNER JOIN user_login ON user_login.id=leave_tbl.user_id WHERE user_login.status=0");
      $sn = 1;
          while($row = mysqli_fetch_array($select_query))
          { 
          $startdate = date('d M Y', strtotime($row['start_date']));
          $enddate = date('d M Y', strtotime($row['end_date']));
          ?>
          <tr>
            <td data-label="No."><?php echo $sn; ?></td>
            <td data-label="Nombre Empleado"><?php echo $row['username']; ?></td>
            <td data-label="Fecha Inicio Permiso"><?php echo $startdate; ?></td>
            <td data-label="Fecha Fin Permiso"><?php echo $enddate; ?></td>
            <td data-label="Descripción"><?php echo $row['description']; ?></td>
            <?php 
            if($row['status'] == 0)
            { ?>
            <td data-label="Acción" >
                <a href="approve-leave.php?id=<?php echo $row['id']; ?>"><button id="aprobar">Aprobar</button></a>&nbsp;&nbsp;
                <a href="reject-leave.php?id=<?php echo $row['id']; ?>"><button>Rechazar</button></a>
            </td>
            <?php } 
            else if($row['status'] == 1) { ?>
            <td data-label="Acción" >
                <span style="color: green; font-weight: 700; ; display: block; ">Aprobado</span>
            </td>
            <?php }
            else
            { ?>
            <td data-label="Acción" id="accion">
                <span style="color: red; font-weight: 700; display: block;">Rechazado</span>
            </td>
            <?php  }
            ?>
          </tr>
          <?php $sn++; } ?>
      </tbody>
    </table>        
    </div>              
</body>
</html>
