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

CREATE TABLE linhas(
    numero_linhas int primary key NOT NULL,
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
    CONSTRAINT fk_motorista_linhas
    FOREIGN KEY (fk_motorista_linhas) REFERENCES funcionario(credencial_funcionario)
);

CREATE TABLE trilhos(
    nome_trilho varchar(45) primary key NOT NULL
);

CREATE TABLE trilhos_manutencao(
    id_manutenção INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_trilho_manutencao varchar(45),
    CONSTRAINT fk_nome_trilho_manutencao
    FOREIGN KEY (fk_nome_trilho_manutencao) REFERENCES trilhos(nome_trilho)
);

CREATE TABLE trilhos_risco(
    id_trilho_risco INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_trilho_risco varchar(45),
    CONSTRAINT fk_nome_trilho_risco
    FOREIGN KEY (fk_nome_trilho_risco) REFERENCES trilhos(nome_trilho)
);

CREATE TABLE botao_emergencia(
linha_botao_emergencia int(3) primary key,
CONSTRAINT fk_linha_botao_emergencia
        FOREIGN KEY (linha_botao_emergencia)
        REFERENCES linhas(numero_linhas)
);

CREATE TABLE gastos_gerais(
id_gastos_gerais int primary key,
gastos_ferrovia int NOT NULL,
gastos_materiais int NOT NULL,
gastos_manutencoes int NOT NULL,
gastos_funcionarios int NOT NULL
);

CREATE TABLE ouvidoria(
id_ouvidoria int primary key,
nome_funcionario varchar(45),
nome_cliente varchar (45),
observacoes_ouvidoria varchar (45) NOT NULL
);

CREATE TABLE alertas_notificacoes(
id_alertas_notficacoes int primary key,
observacoes_alertas_notificacoes varchar(45)
);

CREATE TABLE trens(
nome_trem varchar(45) primary key NOT NULL,
peso_trem int NOT NULL,
temperatura_trem int NOT NULL
);

CREATE TABLE trens_descarrilhados(
nome_trem_descarrilhado varchar(45) primary key,
CONSTRAINT fk_nome_trem_descarrilhado
        FOREIGN KEY (nome_trem_descarrilhado)
        REFERENCES trens(nome_trem)
);

CREATE TABLE sensores(
nome_sensor varchar(45) primary key
);
