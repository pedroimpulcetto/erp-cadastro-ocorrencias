CREATE DATABASE bombeiros;
use bombeiros;

CREATE TABLE talao(
    id_talao int PRIMARY KEY,
    num_talao int,
    hora_chamada int,
    solicitante VARCHAR (30),
    tel_solicitante int,
    endereco VARCHAR(60),
    num_endereco int,
    bairro VARCHAR (30),
    atendente VARCHAR(20), /*atendente*/
    tipo_ocorrencia VARCHAR(20),
    cod_ocorrencia VARCHAR(5),
    prefixo_viatura VARCHAR(10),
    hora_saida INT,
    odo_saida int,
    hora_local INT,
    odo_local INT,
    hora_saida_ocorrencia int,
    ps int,
    saida_ps int,
    hora_pb int,
    odo_pb int,
    num_vitimas int,
    qru VARCHAR (40),
    motorista VARCHAR(20), /*motorista*/
    re int /*comandate*/
);

CREATE TABLE crm(
    crm int PRIMARY KEY,
    nome_medico VARCHAR (50)
);

CREATE TABLE efetivo(
    re int PRIMARY KEY,
    post_grad VARCHAR (10),
    nome_pm VARCHAR (50),
    data_adimissao int,
    tel_pm int,
    cel_pm int,
    data_nasc_pm int,
    email VARCHAR(80)

);

CREATE TABLE viatura(
    prefixo_viatura VARCHAR(10) PRIMARY KEY,
    marca_modelo VARCHAR(30),
    placa VARCHAR(8)
);

ALTER TABLE talao add FOREIGN KEY (prefixo_viatura) REFERENCES viatura(prefixo_viatura);
ALTER TABLE talao add FOREIGN KEY (re) REFERENCES efetivo(re);
