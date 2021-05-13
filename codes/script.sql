create database blog;
use blog;
Create TABLE Articles(
ID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
image varchar(30),
title text,
author varchar(11),
datePub date,
description text);

create TABLE blogger(
ID INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
name varchar(11),
email text,
password int(11)
);


insert into blogger(name,email,password)VALUES("hajar","hajar@gmail.com","123");


