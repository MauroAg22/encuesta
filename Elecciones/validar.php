<?php

require "../clases.php";

$Encuesta = new EncuestaBD("sql10.freesqldatabase.com", "sql10650596", "fumNvyLBuQ", "sql10650596");

$Encuesta->conectar();

$dni = $_POST["dni"];

if ($Encuesta->validar($dni)) {
    echo "verdadero";
} else {
    echo "falso";
}

?>