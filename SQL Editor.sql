﻿CREATE DATABASE db_longavida

USE db_longavida 

CREATE TABLE tbl_plano (
  numero VARCHAR(2) NOT NULL PRIMARY KEY,
  descricao VARCHAR(30),
  valor DECIMAL(10,2)
);

CREATE TABLE tbl_associado (
  plano VARCHAR(2) NOT NULL,
  nome VARCHAR(40) NOT NULL PRIMARY KEY,
  endereco VARCHAR(35),
  cidade VARCHAR(20),
  estado VARCHAR(2),
  cep VARCHAR(9)
);


INSERT INTO tbl_plano (numero, descricao, valor) VALUES 
('B1', 'Básico 1', 200.00),
('B2', 'Básico 2', 150.00),
('B3', 'Básico 3', 100.00),
('E1', 'Executivo 1', 350.00),
('E2', 'Executivo 2', 300.00),
('E3', 'Executivo 3', 250.00),
('M1', 'Master 1', 500.00),
('M2', 'Master 2', 450.00),
('M3', 'Master 3', 400.00);


INSERT INTO tbl_associado (plano, nome, endereco, cidade, estado, cep) VALUES
('B1', 'JOSE ANTONIO DA SILVA', 'R. FELIPE DO AMARAL, 3450', 'COTIA', 'SP', '06700-000'),
('B1', 'MARIA DA SILVA SOBRINHO', 'R. FELIPE DE JESUS, 1245', 'DIADEMA', 'SP', '09960-170'),
('B1', 'PEDRO JOSE DE OLIVEIRA', 'R. AGRIPINO DIAS, 155', 'COTIA', 'SP', '06701-011'),
('B2', 'ANTONIA DE FERNANDES', 'R. PE EZEQUIEL, 567', 'DIADEMA', 'SP', '09960-175'),
('B2', 'ANTONIO DO PRADO', 'R. INDIO TABAJARA, 55', 'GUARULHOS', 'SP', '07132-999'),
('B3', 'WILSON DE SENA', 'R. ARAPIRACA, 1234', 'OSASCO', 'SP', '06293-001'),
('B3', 'SILVIA DE ABREU', 'R. DR. JOAO DA SILVA, 5', 'SANTO ANDRE', 'SP', '09172-112'),
('E1', 'ODETE DA CONCEIÇÃO', 'R. VOLUNTARIOS DA PATRIA, 10', 'SAO PAULO', 'SP', '02010-550'),
('E2', 'JOAO CARLOS MACEDO', 'R. VISTA ALEGRE, 500', 'SAO PAULO', 'SP', '04343-990'),
('E3', 'CONCEIÇÃO DA SILVA', 'AV. VITORIO DO AMPARO, 11', 'MAUA', 'SP', '09321-988'),
('E3', 'PAULO BRUNO AMARAL', 'R. ARGENZIO BRILHANTE, 88', 'BARUERI', 'SP', '06460-999'),
('E3', 'WALDENICE DE OLIVEIRA', 'R. OURO VELHO, 12', 'BARUERI', 'SP', '06440-999'),
('E3', 'MARCOS DO AMARAL', 'R. DO OUVINDOR, 67', 'GUARULHOS', 'SP', '07031-555'),
('M1', 'MURILO DE SANTANA', 'R. PRATA DA CASA', 'SANTO ANDRE', 'SP', '09080-000'),
('M1', 'LUIZA ONOREE FREITAS', 'R. VICENTE DE ABREU, 55', 'SANTO ANDRE', 'SP', '09606-667'),
('M2', 'MELISSA DE ALMEIDA', 'R. FERNANDO ANTONIO, 2345', 'SANTO ANDRE', 'SP', '04842-987'),
('M2', 'JOAO INACIO DA CONCEICAO', 'R. PENELOPE CHARMOSA, 34', 'SUZANO', 'SP', '08670-888'),
('M3', 'AUGUSTA DE ABREU', 'AV. RIO DA SERRA, 909', 'SAO PAULO', 'SP', '09601-333'),
('M3', 'ILDA DE MELO DA CUNHA', 'AV. POR DO SOL, 546', 'SANTO ANDRE', 'SP', '09199-444'),
('M3', 'MARCOS DA CUNHA', 'AV. PEDROSO DE MORAES', 'SAO PAULO', 'SP', '04040-444');




