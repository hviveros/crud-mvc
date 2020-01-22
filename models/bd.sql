/*
Elemental: CRUD de clientes con MVC - PDO
*/

DROP DATABASE IF EXISTS crudmvc;

CREATE DATABASE IF NOT EXISTS crudmvc;

USE crudmvc;

/*tabla cliente*/
CREATE TABLE cliente(
    id INT(4) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
)ENGINE=InnoDB;

/*insersión de datos*/
INSERT INTO `cliente` (`id`, `nombre`, `email`) VALUES
(1, 'Tyrion Lannister', 'tyrion@lannisport.com'),
(2, 'Robb Stark', 'robb@thenorth.com'),
(3, 'Oberyn Martell', 'oberyn@viper.com');