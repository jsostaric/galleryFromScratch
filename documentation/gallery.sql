#mysql -uroot --default_character_set=utf8 < c:\xampp\htdocs\gallery\documentation\gallery.sql

drop database if exists gallery;
create database gallery default character set utf8;
use gallery;

create table users(
id int not null primary key auto_increment,
username varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null
);

create table images(
id int not null primary key auto_increment,
users_id int not null,
name varchar(255) not null
);

create table auth_tokens(
id int not null primary key auto_increment,
selector char(12),
validator char(64),
users_id int not null,
expires datetime
);

alter table gallery add foreign key(users_id) references users(id) on delete cascade;
alter table auth_tokens add foreign key(users_id) references users(id) on delete cascade;

insert into users(username, email, password)
                values('jurica',
                        'jurica@example.com',
                        '$2y$10$tCqsmQI2luZjm2OmhXArG..nXGz3SfXou5undWEpURmm4g7/YWE3O'
                ); #password: 123

