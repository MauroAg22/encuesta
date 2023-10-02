<?php

require "../clases.php";

$Encuesta = new EncuestaBD("localhost", "root", "", "encuesta");

$Encuesta->conectar();

$resultados = Array(
    "candidato1" => $Encuesta->consultar("candidato1"),
    "candidato2" => $Encuesta->consultar("candidato2"),
    "candidato3" => $Encuesta->consultar("candidato3"),
    "candidato4" => $Encuesta->consultar("candidato4")
);

// Devolver una respuesta JSON con el arreglo
echo json_encode($resultados);
?>
