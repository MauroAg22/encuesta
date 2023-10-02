<?php

require "clases.php";

if ($_POST) {
    $Encuesta = new EncuestaBD("localhost", "root", "", "encuesta");

    $respuesta = $_POST["encuesta"];

    $Encuesta->conectar();

    $Encuesta->votar($respuesta);

    $Encuesta->desconectar();

    $Encuesta->redirigir();
}

?>