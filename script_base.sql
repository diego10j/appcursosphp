CREATE TABLE ESTUDIANTE 
(
idEstudiante SERIAL NOT NULL , 
nombres VARCHAR(80) NULL , 
apellidos VARCHAR(80) NULL , 
correo VARCHAR(120) NULL , 
fechaNacimiento DATE NULL , 
telefono VARCHAR(10) NULL , 
pais VARCHAR(50) NULL , 
provincia VARCHAR(50) NULL , 
codigoPostal VARCHAR(15) NULL , 
direccion VARCHAR(100) NULL , 
genero VARCHAR(25) NULL , 
clave VARCHAR(25) NULL , 
avatar VARCHAR(25) NULL , 
fechaRegistro DATETIME NULL , 
fechaModifica DATETIME NULL , 
PRIMARY KEY (idEstudiante)
);



CREATE TABLE CURSO 
(
idCurso SERIAL NOT NULL , 
titulo VARCHAR(160) NULL , 
descripcion VARCHAR(250) NULL , 
urlImagen VARCHAR(200) NULL , 
horas int NULL , 
fechaRegistro DATETIME NULL , 
fechaModifica DATETIME NULL , 
PRIMARY KEY (idCurso)
);
