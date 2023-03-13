drop database project;

create database if not exists project;

use project;

create table if not exists produtos(
    id BIGINT UNSIGNED not null auto_increment,
    nome varchar(255) not null,
    precoCusto decimal(8,2) not null,
    precoVenda decimal(8,2) not null,
    quantidade int not null default(0),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id)
);

create table if not exists funcionarios(
    id BIGINT UNSIGNED not null auto_increment,
    nome varchar(255) not null,
    cpf varchar(255) not null unique,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id)
);

create table if not exists requisicaos(
    id BIGINT UNSIGNED not null auto_increment,
    status boolean default null,
    funcionario_id BIGINT UNSIGNED,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id),
    foreign key(funcionario_id) references funcionarios(id)
);

create table if not exists produto_composto(
    id BIGINT UNSIGNED not null auto_increment,
    nome varchar(255) not null,
    precoCusto decimal(8,2) not null,
    precoVenda decimal(8,2) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id)
    );

create table if not exists produto_produto_compostos(
    id BIGINT UNSIGNED not null auto_increment,
    produto_composto_id BIGINT UNSIGNED not null,
    produto_id BIGINT UNSIGNED not null,
    quantidade int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id),
    foreign key(produto_composto_id) references produto_composto(id),
    foreign key(produto_id) references produtos(id)
    );


create table if not exists lotes(
    id BIGINT UNSIGNED not null auto_increment,
    quantidadeRecebida int not null,
    precoCusto decimal(8,2) not null,
    precoVenda decimal(8,2) not null,
    produto_id BIGINT UNSIGNED,
    produto_composto_id BIGINT UNSIGNED,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id),
    foreign key(produto_id) references produtos(id),
    foreign key(produto_composto_id) references produto_composto(id)
);

create table if not exists listagem_produtos(
    id BIGINT UNSIGNED not null auto_increment,
    produto_id BIGINT UNSIGNED,
    produto_composto_id BIGINT UNSIGNED,
    requisicao_id BIGINT UNSIGNED not null,
    quantidade int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id),
    foreign key(produto_id) references produtos(id),
    foreign key(produto_composto_id) references produto_composto(id),
    foreign key(requisicao_id) references requisicaos(id)
);

INSERT INTO produtos (nome, precoCusto, precoVenda, quantidade)
VALUES
    ('Produto A', 10.00, 20.00, 100),
    ('Produto B', 15.00, 30.00, 50);

INSERT INTO funcionarios (nome, cpf)
VALUES
    ('João Silva', '123.456.789-00'),
    ('Maria Souza', '987.654.321-00');

INSERT INTO requisicaos (status, funcionario_id)
VALUES
    (true, 1),
    (false, 2);

INSERT INTO produto_composto (nome, precoCusto, precoVenda)
VALUES
    ('Produto Composto X', 50.00, 100.00),
    ('Produto Composto Y', 70.00, 130.00);

INSERT INTO produto_produto_compostos (produto_composto_id, produto_id, quantidade)
VALUES
    (1, 1, 2),
    (1, 2, 1),
    (2, 1, 1),
    (2, 2, 3);

INSERT INTO lotes (quantidadeRecebida, precoCusto, precoVenda, produto_id)
VALUES
    (50, 10.00, 20.00, 1),
    (20, 12.00, 25.00, 2),
    (30, 60.00, 110.00, NULL);

INSERT INTO lotes (quantidadeRecebida, precoCusto, precoVenda, produto_composto_id)
VALUES
    (10, 50.00, 100.00, 1),
    (5, 70.00, 130.00, 2);

INSERT INTO listagem_produtos (produto_id, requisicao_id, quantidade)
VALUES
    (1, 1, 10),
    (2, 1, 5),
    (1, 2, 2),
    (2, 2, 3),
    (NULL, 2, 1);


-- Entrada de estoque
SELECT
    CASE
        WHEN p.id IS NOT NULL THEN p.nome
        ELSE pc.nome
        END AS produto,
    SUM(l.quantidadeRecebida) AS quantidade,
    SUM(l.precoCusto * l.quantidadeRecebida) AS precoCusto,
    SUM(l.precoVenda * l.quantidadeRecebida) AS precoVenda
FROM
    lotes l
        LEFT JOIN produtos p ON p.id = l.produto_id
        LEFT JOIN produto_composto pc ON pc.id = l.produto_composto_id
GROUP BY
    produto;

