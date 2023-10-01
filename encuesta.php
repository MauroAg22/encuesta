<?php

class EncuestaBD
{
    private $servidor, $usuario, $contrasenia, $nombrebd, $conexion;

    public function __construct($servidor, $usuario, $contrasenia, $nombrebd)
    {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->contrasenia = $contrasenia;
        $this->nombrebd = $nombrebd;
    }

    public function conectar() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->nombrebd", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión establecida";
        } catch (PDOException $error) {
            echo "Conexion erronea: " . $error->getMessage();
        }
    }

    public function votar($miVoto) {
        try {
            $sql = "INSERT INTO `fotos` (`id`, `nombre`, `ruta`) VALUES (NULL, 'Foto de perfil', 'perfil.png');";
            $this->conexion->exec($sql);
            echo "Registro insertado correctamente";
        } catch (PDOException $error) {
            echo "Error al insertar registro: " . $error->getMessage();
        }
    }

    public function desconectar() {
        $this->conexion = null;
    }

}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wvalueth=device-wvalueth, initial-scale=1.0">
    <style>
        h2 {
            margin: 0;
            padding: 0;
        }

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
        <h2>¿Quién gana el superclásico este domingo?</h2>
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



    $Encuesta = new EncuestaBD("localhost", "root", "", "encuesta");

    $Encuesta->conectar();

    // $Encuesta->votar($respuesta);

    $Encuesta->desconectar();


    echo $respuesta . "<br><br>";
}



?>