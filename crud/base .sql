	use brayan;

	create table generos(
	id_genero int auto_increment,
	genero varchar(10),
	primary key(id_genero));
    
    insert into generos(genero) values ('Masculino'),('Femenino'),('Otro');

	create table ciudades(
	id_ciudad int auto_increment,
	ciudad varchar(50),
	primary key(id_ciudad));
    
    insert into ciudades (ciudad) values ('Bucaramanga'),('Giron'),('Piedecuesta');

	create table lenguajes(
	id_lenguaje int auto_increment,
	nombre_lenguaje varchar(30),
	primary key(id_lenguaje));
    
    insert into lenguajes (nombre_lenguaje) values ('Java'),('Phyton'),('JavaScript'),('.NET');

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
    
    create table lenguaje_usuario(
    id_usuario int,
    id_lenguaje int,
    foreign key(id_usuario) references usuarios(id_usuario),
    foreign key(id_lenguaje)references lenguajes(id_lenguaje));
    
    select * from lenguaje_usuario;