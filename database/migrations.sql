DROP TABLE IF EXISTS genero;
DROP TABLE IF EXISTS estados;
DROP TABLE IF EXISTS municipios;
DROP TABLE IF EXISTS ine;


CREATE TABLE estados (
id_estado_pk TINYINT PRIMARY KEY NOT NULL,
estado VARCHAR(40) NOT NULL UNIQUE);

CREATE TABLE municipios (
id_municipio_pk INT PRIMARY KEY NOT NULL,
municipio VARCHAR(30) NOT NULL,
id_estado_fk TINYINT NOT NULL);

CREATE TABLE genero (
id_genero_pk TINYINT PRIMARY KEY NOT NULL,
sexo VARCHAR(20) NOT NULL UNIQUE);

CREATE TABLE ine (
id_ine_pk BIGINT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL,
ap_paterno VARCHAR(40) NOT NULL,
ap_materno VARCHAR(40),
id_genero_fk TINYINT NOT NULL,
calle VARCHAR(30) NOT NULL,
interior VARCHAR(10) NOT NULL,
exterior VARCHAR(10) NOT NULL,
colonia VARCHAR(30) NOT NULL,
cp VARCHAR(10) NOT NULL,
id_municipio_fk INT NOT NULL,
clave VARCHAR(18) NOT NULL UNIQUE,
curp VARCHAR(18) NOT NULL UNIQUE,
nacimiento DATE NOT NULL);

ALTER TABLE municipios ADD CONSTRAINT municipios_id_estado_fk_estados_id_estado_pk FOREIGN KEY (id_estado_fk) REFERENCES estados(id_estado_pk);
ALTER TABLE ine ADD CONSTRAINT ine_id_genero_fk_Genero_id_genero_pk FOREIGN KEY (id_genero_fk) REFERENCES genero(id_genero_pk);
ALTER TABLE ine ADD CONSTRAINT ine_id_municipio_fk_Municipios_id_municipio_pk FOREIGN KEY (id_municipio_fk) REFERENCES municipios(id_municipio_pk);
