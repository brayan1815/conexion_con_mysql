	use brayan;

	create table generos(
	id_genero int auto_increment,
	genero varchar(10),
	primary key(id_genero));

	create table ciudades(
	id_ciudad int auto_increment,
	ciudad varchar(50),
	primary key(id_ciudad));

	create table lenguajes(
	id_lenguaje int auto_increment,
	nombre_lenguaje varchar(30),
	primary key(id_lenguaje));

	create table usuarios(
	id_usuario int auto_increment,
	nombre_usuario varchar(50),
	apellido_usuario varchar (50),
	correo_usuario varchar(50),
	fecha_nacimiento date,
	genero int,
	ciudad int,
	unique(correo_usuario),
	primary key(id_usuario),
	foreign key(genero) references generos(id_genero),
	foreign key(ciudad) references ciudades(id_ciudad));