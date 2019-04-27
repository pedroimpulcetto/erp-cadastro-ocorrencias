CREATE DATABASE bombeiros;
use bombeiros;

CREATE TABLE talao( 
    id_talao int PRIMARY KEY AUTO_INCREMENT,
    inputNumTalao int,
    inputData date,
    inputHoraChamada int,
    inputSolicitante VARCHAR(30),
    inputTel int,
    inputEndereco VARCHAR(60),
    inputNum int,
    inputBairro VARCHAR (30),
    inputAtendente VARCHAR(20), /*atendente*/
    inputTipoOcorrencia VARCHAR(20),
    inputCod VARCHAR(5),
    inputVtr VARCHAR(10),
    inputHS INT,
    inputOS int,
    inputHL INT,
    inputOL INT,
    inputSL int,
    inputPS int,
    inputSPS int,
    inputHPB int,
    inputOPB int,
    inputNumVitimas int,
    inputQruOcor VARCHAR (40),
    inputMotorista VARCHAR(30), /*motorista*/
    inputComandante VARCHAR(30) /*comandate*/
);

CREATE TABLE crm(
    inputCRM int PRIMARY KEY,
    inputNomeMedico VARCHAR (50)
);

CREATE TABLE efetivo(
    inputRE int PRIMARY KEY,
    inputPostGrad VARCHAR (10),
    inputNomeCompleto VARCHAR (50),
    inputDataAdmissao date,
    inputFone int,
    inputCel int,
    inputDN date,
    inputEmail VARCHAR(80)

);

CREATE TABLE viatura(
    inputPrefixo VARCHAR(10) PRIMARY KEY,
    inputMM VARCHAR(30),
    inputPlaca VARCHAR(8)
);



