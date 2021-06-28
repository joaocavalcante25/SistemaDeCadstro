CREATE SCHEMA IF NOT EXISTS quality;

CREATE TABLE IF NOT EXISTS quality.Cadastro(
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(55) NOT NULL,
    data_nasc DATE NOT NULL,
    email varchar(55) NOT NULL,
    foto longblob,
    status boolean NOT NULL,
    PRIMARY KEY(id)
)AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS quality.Dependente(
    id int NOT NULL AUTO_INCREMENT, 
    nome varchar(55) NOT NULL, 
    data_nasc_dep DATE NOT NULL,
    id_cadastro int NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT id_cad_FK FOREIGN KEY(id_cadastro) REFERENCES Cadastro(id) ON DELETE CASCADE
)AUTO_INCREMENT=0;
