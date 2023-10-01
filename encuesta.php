<?php

class EncuestaBD {
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
            // echo "Conexión establecida";
        } catch (PDOException $error) {
            echo "Conexion erronea: " . $error->getMessage();
        }
    }

    public function votar($miVoto) {

        switch ($miVoto) {
            case 1:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, '1', NULL, NULL, NULL);";
                try {
                    $this->conexion->exec($sql);
                    echo "Respuesta enviada correctamente";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 2:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, '1', NULL, NULL);";
                try {
                    $this->conexion->exec($sql);
                    echo "Respuesta enviada correctamente";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 3:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, '1', NULL);";
                try {
                    $this->conexion->exec($sql);
                    echo "Respuesta enviada correctamente";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 4:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, NULL, '1');";
                try {
                    $this->conexion->exec($sql);
                    echo "Respuesta enviada correctamente";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
        }

        $sql =  "";
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
        <h2>¿Quién ganará las elecciones?</h2>
        <br><br>
        <label>
            <input type="radio" name="encuesta" value="1" required>Candidato 1
        </label>
        <br>
        <label>
            <input type="radio" name="encuesta" value="2">Candidato 2
        </label>
        <br>
        <label>
            <input type="radio" name="encuesta" value="3">Candidato 3
        </label>
        <br>
        <label>
            <input type="radio" name="encuesta" value="4">Candidato 4
        </label>
        <br><br>
        <input type="submit" value="Enviar">
        <br><br>
    </form>
</body>

</html>


<?php


if ($_POST) {
    $Encuesta = new EncuestaBD("localhost", "root", "", "encuesta");

    $respuesta = $_POST["encuesta"];

    $Encuesta->conectar();

    $Encuesta->votar($respuesta);

    $Encuesta->desconectar();

    $respuesta = 0;

}

?>