
-- base de datos local
USE `encuesta`;

-- creacion de la tabla padron
CREATE TABLE `padron` (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  dni VARCHAR(50) NOT NULL UNIQUE,
  sexo VARCHAR(50) NOT NULL,
  fecha_nac DATE NOT NULL,
  direccion VARCHAR(100) NOT NULL
);

-- insertando datos alpadron
INSERT INTO `padron` (nombre, apellido, dni, sexo, fecha_nac, direccion)
VALUES 	('Juan', 'Pérez', '12345678', 'Masculino', '1990-01-15', 'Calle Principal 123');

INSERT INTO `padron` (nombre, apellido, dni, sexo, fecha_nac, direccion)
VALUES	('Nicolás', 'Gutierrez', '41667254', 'Masculino', '1998-04-25', 'Urquiza 446'),
		('María', 'González', '23456789', 'Femenino', '1985-05-20', 'Avenida Central 456'),
		('Luis', 'Rodríguez', '34567890', 'Masculino', '1992-09-10', 'Calle Secundaria 789'),
		('Mauro Agustín', 'Lucero', '40319143', 'Masculino', '1997-07-29', 'Miguel B. Pastor 1453');

-- devuelve 1 si el dni existe, sino devuelve 0
SELECT CASE WHEN EXISTS (SELECT 1 FROM padron WHERE dni = '41667254') THEN 1 ELSE 0 END AS existe;

