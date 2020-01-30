CREATE TABLE `cursos`.`ESTUDIANTE` 
(
`idEstudiante` SERIAL NOT NULL , 
`nombres` VARCHAR(80) NULL , 
`apellidos` VARCHAR(80) NULL , 
`correo` VARCHAR(120) NULL , 
`fechaNacimiento` DATE NULL , 
`telefono` VARCHAR(10) NULL , 
`pais` VARCHAR(50) NULL , 
`provincia` VARCHAR(50) NULL , 
`codigoPostal` VARCHAR(15) NULL , 
`direccion` VARCHAR(100) NULL , 
`genero` VARCHAR(25) NULL , 
`clave` VARCHAR(25) NULL , 
`avatar` VARCHAR(25) NULL , 
`fechaRegistro` DATETIME NULL , 
`fechaModifica` DATETIME NULL , 
PRIMARY KEY (`idEstudiante`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;;
