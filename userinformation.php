<?php

$connection = mysqli_connect('localhost','root','','ems');

if (!$connection) {
    die("La conexión falló: " . mysqli_connect_error());
}

$user = $_POST['user'];
$email = $_POST['email'];
$message = $_POST['message'];

$query = "INSERT INTO `userinfodata`(`user`,`email`,`message`) VALUES ('$user','$email','$message')";

if (mysqli_query($connection, $query)) {
    // echo "El mensaje se ha enviado correctamente";
    header("Location: newsletter/success.html");
    exit(); // Termina el script después de la redirección
} else {
    header("Location: newsletter/fail.html");
    // echo "Error al enviar el mensaje: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
