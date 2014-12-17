create schema if not exists login;
use login;


create table if not exists login (
    uid int not null auto_increment,
    username varchar(120) not null primary key,
	password varchar(255)

);