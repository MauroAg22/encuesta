<?php

class encuesta {

    function __construct($servername, $username, $password, $dbname)
    {
        $servername = "localhost"; // 127.0.0.1
        $username = "root";
        $password = "";
        $dbname = "encuesta";
    }
    
    

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


    function conectar() {
        

        try {
            
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            echo gettype($conn);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e -> getMessage();
            
        }
    }

    function desconectar() {
        // $conn = null;
        echo gettype($conn);
    }

}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wvalueth=device-wvalueth, initial-scale=1.0">
    <style>
        body {
            background-color: #222;
            color: #fff;
            padding: 10vh 10vw;
        }
    </style>
    <title>Encuesta</title>
</head>

<body>
    <form action="encuesta.php" method="post">
        ¿Quién gana el superclásico este domingo?
        <br><br>
        <label>
            <input type="radio" name="encuesta" value="1" required>River Plate
        </label>
        <br>
        <label>
            <input type="radio" name="encuesta" value="2">Boca Juniors
        </label>
        <br>
        <label>
            <input type="radio" name="encuesta" value="3">Termina en empate
        </label>
        <br>
        <label>
            <input type="radio" name="encuesta" value="4">El partido se suspende
        </label>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>


<?php


if ($_POST) {
    $respuesta = $_POST["encuesta"];

    echo $respuesta . "<br><br>";
}


$miObjeto = new encuesta();

$miObjeto->conectar();
$miObjeto->desconectar();





?>




