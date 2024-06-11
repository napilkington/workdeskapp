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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver tareas</title>
    <style type="text/css">
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
            .table td:last-child {
                border-bottom: 0;
            }
            .flex-container {                
                display: flex;
                justify-content: flex-start;
                gap: 20px;
            }
            #info {
                margin-left: -15px;
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

            doc.save('tareas.pdf');
        }
    </script>

</head>
<body>
    <div class="alert alert-primary" role="alert">Ver tareas</div>
    <div class="buttons-container">
        <button onclick="printTable()">Imprimir</button>
        <button onclick="downloadPDF()">Descargar PDF</button>
    </div>
    <div class="table-container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Asignado a</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Esperada</th>                    
                    <th scope="col">Fecha Entregada</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_query = mysqli_query($conn, "SELECT work_tbl.*, user_login.username FROM work_tbl INNER JOIN user_login ON user_login.id = work_tbl.user_id");
                $sn = 1;
                while($row = mysqli_fetch_array($select_query)) { 
                ?>
                <tr>
                    <td data-label="No."><?php echo $sn; ?></td>
                    <td data-label="Título"><?php echo $row['title']; ?></td>
                    <td data-label="Descripción"><?php echo $row['description']; ?></td>
                    <td data-label="Asignado a"><?php echo $row['username']; ?></td>
                    <td data-label="Fecha Inicio"><?php echo $row['startdate']; ?></td>
                    <td data-label="Fecha Esperada"><?php echo $row['duedate']; ?></td>
                    <td data-label="Fecha Entrega"><?php echo ($row['status']==0) ? "-" : $row['enddate']; ?></td>
                    <td data-label="Estado"><?php echo ($row['status']==0) ? "<span style='color:red'>Incompleta</span>" : "<span style='color:green'>Completa</span>"; ?></td>
                    
                </tr>
                <?php $sn++; } ?>                                                   
            </tbody>
        </table>
    </div>
</body>
</html>
