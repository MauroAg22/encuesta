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
                    echo "<h1>Respuesta enviada correctamente</h2>";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 2:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, '1', NULL, NULL);";
                try {
                    $this->conexion->exec($sql);
                    echo "<h1>Respuesta enviada correctamente</h2>";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 3:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, '1', NULL);";
                try {
                    $this->conexion->exec($sql);
                    echo "<h1>Respuesta enviada correctamente</h2>";
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 4:
                $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, NULL, '1');";
                try {
                    $this->conexion->exec($sql);
                    echo "<h1>Respuesta enviada correctamente</h2>";
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