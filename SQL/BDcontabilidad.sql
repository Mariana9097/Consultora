DROP DATABASE IF EXISTS contabilidad;

CREATE DATABASE contabilidad;

USE contabilidad;

CREATE TABLE empresaclientes(
	id int AUTO_INCREMENT,
	nombre varchar(60),
	PRIMARY KEY(id)
);

CREATE TABLE clientes(
	idcliente int AUTO_INCREMENT,
	nombrecliente varchar(60),
	empresacliente_id int,
	email varchar(60),
	telefonocliente int(15),
	plazopago int(3),
	PRIMARY KEY(id),
	FOREIGN KEY(empresacliente_id) REFERENCES empresaclientes(id)
);

CREATE TABLE facturas(
	id int AUTO_INCREMENT,
	nrofact int,
	fechaEmision date,
	montofact float,
	cliente_id int,
	PRIMARY KEY(id),
	FOREIGN KEY(cliente_id) REFERENCES clientes(id)
);
