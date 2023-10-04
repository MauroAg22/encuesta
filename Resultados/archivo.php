<?php

require "../clases.php";

$Encuesta = new EncuestaBD("sql10.freesqldatabase.com", "sql10650596", "fumNvyLBuQ", "sql10650596");

$Encuesta->conectar();

$resultados = Array(
    "candidato1" => $Encuesta->consultar("candidato1"),
    "candidato2" => $Encuesta->consultar("candidato2"),
    "candidato3" => $Encuesta->consultar("candidato3"),
    "candidato4" => $Encuesta->consultar("candidato4")
);

echo json_encode($resultados);
?>
