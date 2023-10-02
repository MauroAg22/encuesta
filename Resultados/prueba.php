<?php

require "../clases.php";

$Encuesta = new EncuestaBD("localhost", "root", "", "encuesta");

$Encuesta->conectar();

$miArreglo = Array(
    $Encuesta->consultar("candidato1"),
    $Encuesta->consultar("candidato2"),
    $Encuesta->consultar("candidato3"),
    $Encuesta->consultar("candidato4")
);

echo json_encode($miArreglo);

?>