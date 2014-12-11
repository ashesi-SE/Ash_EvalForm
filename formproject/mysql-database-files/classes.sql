create schema if not exists ADMIN;
use ADMIN;


create table if not exists admin (
    username varchar(120) not null primary key,
	password varchar(255)

);