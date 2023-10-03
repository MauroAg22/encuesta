<?php

require "clases.php";

if ($_POST) {
    $Encuesta = new EncuestaBD("sql10.freesqldatabase.com", "sql10650596", "fumNvyLBuQ", "sql10650596");

    $respuesta = $_POST["encuesta"];

    $Encuesta->conectar();

    $Encuesta->votar($respuesta);

    $Encuesta->desconectar();

    $Encuesta->redirigir();
}

?>