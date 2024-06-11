<?php
session_start();
include ('../include/conn.php');
$id = $_SESSION['eid'];
if(empty($id)) {
    header("Location: ../index.html"); 
}
if(isset($_GET['delid'])) {
    $employeeid = $_GET['delid'];
    $query = mysqli_query($conn, "DELETE user_login, profile_tbl FROM user_login INNER JOIN profile_tbl ON profile_tbl.email = user_login.email WHERE user_login.email='$employeeid'");
    echo "<script>alert('Registro borrado con éxito.');</script>";
    echo "<script>window.location.href='view-employee.php'</script>";
}

include "header.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Empleado</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 1.1rem;
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

            doc.save('empleados.pdf');
        }
    </script>
</head>
<body>
    <div class="alert alert-primary" role="alert">Listado de Empleados</div>
    <div class="buttons-container">
        <button onclick="printTable()">Imprimir</button>
        <button onclick="downloadPDF()">Descargar PDF</button>
    </div>
    <div class="table-container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nombre Usuario</th>
                    <th scope="col">Email_ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_query = mysqli_query($conn, "SELECT * FROM user_login WHERE status=0");
                $sn = 1;
                while($row = mysqli_fetch_array($select_query)) { 
                ?>
                <tr>
                    <td data-label="No."><?php echo $sn; ?></td>
                    <td data-label="Nombre Usuario"><?php echo $row['username']; ?></td>
                    <td data-label="Email_ID"><?php echo $row['email']; ?></td>
                    <td data-label="Fecha"><?php echo $row['date']; ?></td>
                    <td data-label="Acción" class="flex-container">
                        <a id="info" href="employee-profile.php?viewid=<?php echo $row['email'];?>" style="color: blue">Info</a>&nbsp;&nbsp;
                        <a href="edit-employee.php?editid=<?php echo $row['email'];?>" style="color: orange">Editar</a>&nbsp;&nbsp;
                        <a href="view-employee.php?delid=<?php echo $row['email'];?>" style="color: red" onclick="return confirm('¿Seguro que quiere borrar el empleado?');">Borrar</a>
                    </td>
                </tr>
                <?php $sn++; } ?>                                                   
            </tbody>
        </table>
    </div>
</body>
</html>
