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
