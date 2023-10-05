-- selecciona la base de datos
USE `sql10650596`;

-- mostrar tabla
SELECT * FROM `urna`;

-- inserta un voto
INSERT INTO `urna` (`candidato1`) VALUES ('1');
INSERT INTO `urna` (`candidato2`) VALUES ('1');
INSERT INTO `urna` (`candidato3`) VALUES ('1');
INSERT INTO `urna` (`candidato4`) VALUES ('1');

-- insertar un voto (antiguo)
INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, '1', NULL, NULL, NULL);
INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, '1', NULL, NULL);
INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, '1', NULL);
INSERT INTO `urna` (`id`, `candidato1`, `candidato2`, `candidato3`, `candidato4`) VALUES (NULL, NULL, NULL, NULL, '1');

-- cuenta la cantidad de votos de cada candidato
SELECT COUNT(candidato1) AS total FROM urna;
SELECT COUNT(candidato2) AS total FROM urna;
SELECT COUNT(candidato3) AS total FROM urna;
SELECT COUNT(candidato4) AS total FROM urna;

-- cuenta la cantidad de votos de cada candidato (antiguo)
SELECT COUNT(*) AS total FROM urna WHERE candidato1 IS NOT NULL;
SELECT COUNT(*) AS total FROM urna WHERE candidato2 IS NOT NULL;
SELECT COUNT(*) AS total FROM urna WHERE candidato3 IS NOT NULL;
SELECT COUNT(*) AS total FROM urna WHERE candidato4 IS NOT NULL;