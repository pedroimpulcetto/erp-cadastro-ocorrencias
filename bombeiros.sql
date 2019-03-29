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
    inputPrefixo VARCHAR(10),
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
    inputTipo VARCHAR(2),
    inputMM VARCHAR(30),
    inputPlaca VARCHAR(8)
);

ALTER TABLE talao add FOREIGN KEY (inputPrefixo) REFERENCES viatura(inputPrefixo);



SELECT * from crm 
INSERT INTO crm (inputCRM, inputNomeMedico) VALUES ('123141', 'DR ALLAN'), ('177456', 'DRA NAJILA'), ('342423', 'DR CALORS'), ('54333', 'DRA JUDITE');

select * from viatura
INSERT INTO viatura (inputPrefixo, inputTipo, inputMM, inputPlaca) VALUES ('AB16201', 'AB', 'IVECO', 'EDG7733'), ('AT16211', 'AT', 'IVECO', 'ERT5432');

select * from talao
insert into talao (id_talao, inputNumTalao, inputData, inputHoraChamada, inputSolicitante, inputTel, inputEndereco, inputNum, inputBairro, inputAtendente, inputTipoOcorrencia, inputCod, inputPrefixo, inputHS, inputOS, inputHL, inputOL, inputSL, inputPS, inputSPS, inputHPB, inputOPB, inputNumVitimas, inputQruOcor, inputMotorista, inputComandante) VALUES ('0', '123', '2019-03-13', '2202', 'Pedro', '998304135', 'RUA JOSE LOPES SILVA', '340', 'JD LEMENSE', 'CB FAVERI', 'CARRO X MOTO', 'L08', 'UR16215', '2200', '1234', '2201', '1235', '2202', '2203', '2204', '2205', '1236', '2', 'CARRO X MOTO', 'CB DJONATAS', '1231'), ('1', '1312', '2019-03-05', '1211', 'JANAINA', '1235224324', 'AVENIDA PAUL HARRIS', '1330', 'JD DO BOSQUE', 'SD CARLOS', 'INCENDIO', 'N01', 'AT16211', '1234', '435423', '234234', '13121', '31312', '54534', '224', '23423', '12312', '0', 'INCENDIO EM RESIDENCIA', 'SD PERISSOTTO', '1231221');


select * from efetivo
INSERT INTO efetivo (inputRE, inputPostGrad, inputNomeCompleto, inputDataAdmissao, inputFone, inputCel, inputDN, inputEmail) VALUES ('871234', '1 Ten PM', 'ANDRE GIULIANO RISSO BOVOLON', '12031990', '123141432', '324424234', '21021967', 'andrebovolon@policiamilitar.sp.gov.br'), ('138637', 'Cb PM', 'PEDRO FAVERI IMPULCETTO', '20110117', '', '998305135', '22021991', 'pedro.impulcetto@policiamilitar.sp.gov.br');