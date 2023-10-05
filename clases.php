<?php

class EncuestaBD {
    private $servidor, $usuario, $contrasenia, $nombrebd, $conexion, $enviados = false;

    public function __construct($servidor, $usuario, $contrasenia, $nombrebd) {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->contrasenia = $contrasenia;
        $this->nombrebd = $nombrebd;
    }

    public function __destruct() {
        if ($this->conexion != null) {
            $this->desconectar();
        }
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
                // $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, '1', NULL, NULL, NULL);";
                $sql = "INSERT INTO `urna` (`candidato1`) VALUES ('1');";
                try {
                    $this->conexion->exec($sql);
                    $this->enviados = true;
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 2:
                // $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, '1', NULL, NULL);";
                $sql = "INSERT INTO `urna` (`candidato2`) VALUES ('1');";
                try {
                    $this->conexion->exec($sql);
                    $this->enviados = true;
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 3:
                // $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, '1', NULL);";
                $sql = "INSERT INTO `urna` (`candidato3`) VALUES ('1');";
                try {
                    $this->conexion->exec($sql);
                    $this->enviados = true;
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
            case 4:
                // $sql = "INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, NULL, '1');";
                $sql = "INSERT INTO `urna` (`candidato4`) VALUES ('1');";
                try {
                    $this->conexion->exec($sql);
                    $this->enviados = true;
                } catch (PDOException $error) {
                    echo "Error al insertar registro: " . $error->getMessage();
                }
                break;
        }
    }

    public function  consultar($candidato) {
        
        // $sql = "SELECT COUNT(*) AS total FROM urna WHERE $candidato IS NOT NULL;";  Sentencia SQL
        $sql = "SELECT COUNT($candidato) AS total FROM urna;";

        $sentencia = $this->conexion->prepare($sql); // Preparo la selección

        $sentencia->execute(); // Ejecuto

        $resultado = $sentencia->fetchAll(); // Obtengo los resultados

        return $resultado[0]["total"];
    }

    public function desconectar() {
        $this->conexion = null;
    }

    public function redirigir() {
        if ($this->enviados) {
            header("Location: Envio/");
        } else {
            header("Location: Envio/error.html");
        }
    }
}

?>