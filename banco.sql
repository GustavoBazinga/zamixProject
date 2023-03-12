drop database project;

create database if not exists project;

use project;

create table if not exists produtos(
    id BIGINT UNSIGNED not null auto_increment,
    nome varchar(255) not null,
    precoCusto decimal(8,2) not null,
    precoVenda decimal(8,2) not null,
    quantidade int not null,
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

create table if not exists funcionario_produtos(
    id BIGINT UNSIGNED not null auto_increment,
    funcionario_id BIGINT UNSIGNED not null,
    produto_id BIGINT UNSIGNED not null,
    quantidade int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id),
    foreign key(funcionario_id) references funcionarios(id),
    foreign key(produto_id) references produtos(id)
);

create table if not exists lotes(
    id BIGINT UNSIGNED not null auto_increment,
    produto_id BIGINT UNSIGNED,
    produto_composto_id BIGINT UNSIGNED,
    precoLote decimal(8,2) not null,
    quantidade int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    primary key(id),
    foreign key(produto_id) references produtos(id),
    foreign key(produto_composto_id) references produto_composto(id)
);


-- Instrução para coletar dados de entrada de produtos
select * from lotes where created_at between '2021-01-01' and '2021-01-31';

-- Instrução para coletar dados de saída de produtos
select * from funcionario_produtos where created_at between '2021-01-01' and '2021-01-31';
