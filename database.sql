create database farmacia

use farmacia;

create table produtos (
id int auto_increment primary key,
nome varchar(100) not null,
fabricante varchar(100) not null,
preco decimal(10,2),
estoque int
)