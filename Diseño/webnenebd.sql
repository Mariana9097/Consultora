CREATE TABLE empresa(
               id INT NOT NULL  AUTO_INCREMENT,
	nombreFantasia VARCHAR(65) NOT NULL,
                  razonSocial VARCHAR(65) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(25) NOT NULL,
	fechaRegistro DATETIME NOT NULL,
 	cuit INT NOT NULL,
	activo TINYINT NOT NULL,
                  telefono INT NOT NULL,
              	nombContacto VARCHAR(65) NOT NULL,
              	actividad VARCHAR(255) NOT NULL,
 	empleados INT NOT NULL,
              	provincia_id int,
	PRIMARY KEY(id),
	FOREIGN KEY (provincia_id) REFERENCES provincia(id)
)ENGINE = MyISAM ;
