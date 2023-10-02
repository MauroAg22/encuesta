<?php

require "clases.php";

if ($_POST) {
    $Encuesta = new EncuestaBD("localhost", "root", "", "encuesta");

    $respuesta = $_POST["encuesta"];

    $Encuesta->conectar();

    $Encuesta->votar($respuesta);

    $Encuesta->desconectar();

    $respuesta = 0;

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Encuesta</title>
</head>
<body>
    <br><br>
    <a href="index.html"><button>VOLVER</button></a>
</body>
</html>