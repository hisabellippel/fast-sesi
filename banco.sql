CREATE DATABASE fast_sesi_sa;
USE fast_sesi_sa;

CREATE TABLE funcionario(
    credencial_funcionario INT AUTO_INCREMENT primary key NOT NULL,
    nome_funcionario varchar(120) NOT NULL,
    cpf_funcionario varchar(11) NOT NULL,
    email_funcionario varchar(45) NOT NULL,
    telefone_funcionario int(15) NOT NULL,
    salario_funcionario int NOT NULL,
    senha_funcionario varchar(255) NOT NULL,
    funcao_funcionario varchar(45) NOT NULL,
    data_nascimento_funcionario date NOT NULL
);

CREATE TABLE trilhos(
    nome_trilho varchar(45) primary key AUTO_INCREMENT NOT NULL
);

CREATE TABLE gastos_gerais(
    id_gastos_gerais int primary key AUTO_INCREMENT NOT NULL,
    gastos_ferrovia int NOT NULL,
    gastos_materiais int NOT NULL,
    gastos_manutencoes int NOT NULL,
    gastos_funcionarios int NOT NULL
);

CREATE TABLE alertas_notificacoes(
    id_alertas_notficacoes int primary key AUTO_INCREMENT NOT NULL,
    observacoes_alertas_notificacoes varchar(45)
);

CREATE TABLE trens(
    id_trem varchar(45) primary key AUTO_INCREMENT NOT NULL,
    peso_trem int NOT NULL,
    temperatura_trem int NOT NULL
);

CREATE TABLE sensores(
    nome_sensor varchar(45) primary key
);

CREATE TABLE linhas(
    numero_linhas int primary key AUTO_INCREMENT NOT NULL ,
    nome_linhas varchar(45) NOT NULL,
    velocidade_linhas int(45) NOT NULL,
    passageiros_linhas int NOT NULL,
    avisos_linhas varchar(45) NOT NULL,
    distancia_linhas int NOT NULL,
    horario_linhas DATETIME NOT NULL, 
    eficiencia_eletrica_linhas varchar(45) NOT NULL,
    consumo_energia_linhas int NOT NULL,
    acidentes_linhas int NOT NULL,
    falhas_tecnicas_linhas varchar(45),
    motorista_linhas varchar(45) NOT NULL,
    FOREIGN KEY (motorista_linhas) REFERENCES funcionario(credencial_funcionario)
);

CREATE TABLE trilhos_manutencao(
    id_manutenção INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_trilho_manutencao varchar(45),
    nome_trilho_manutencao
    FOREIGN KEY (nome_trilho_manutencao) REFERENCES trilhos(nome_trilho)
);

CREATE TABLE trilhos_risco(
    id_trilho_risco INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_trilho_risco varchar(45),
    nome_trilho_risco,
    FOREIGN KEY (nome_trilho_risco) REFERENCES trilhos(nome_trilho)
);

CREATE TABLE botao_emergencia(
    id_linha_botao_emergencia INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    linha_botao_emergencia int(3),
    FOREIGN KEY (linha_botao_emergencia) REFERENCES linhas(numero_linhas)
);

CREATE TABLE ouvidoria(
    id_ouvidoria int primary key AUTO_INCREMENT NOT NULL,
    nome_cliente varchar (45),
    observacoes_ouvidoria varchar (45) NOT NULL,
    nome_funcionario varchar(45)
    FOREIGN KEY (nome_funcionario) REFERENCES funcionario(credencial_funcionario)
);

CREATE TABLE trens_descarrilhados(
    ID_trem_descarrilhado varchar(45) primary key AUTO_INCREMENT NOT NULL,
    nome_trem_descarrilhado varchar(45),
    FOREIGN KEY (nome_trem_descarrilhado) REFERENCES trens(id_trem)
);
