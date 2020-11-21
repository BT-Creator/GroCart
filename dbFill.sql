create database if not exists grocart;

/*Before importing the database, do not forget to run migrating if the Authentication module is implemented.*/

create table items(
    id int auto_increment primary key not null,
    name varchar(64) not null,
    weight double null,
    note longtext null
);

create table stores(
    id int auto_increment primary key not null,
    street varchar(64) not null,
    house_number varchar(6) not null,
    postal_code varchar(8) not null,
    city varchar(64) not null,
    country varchar(64) not null
);

create table deliveries(
    id int auto_increment primary key not null,
    street varchar(64) not null,
    house_number varchar(6) not null,
    postal_code varchar(8) not null,
    city varchar(64) not null,
    country varchar(64) not null
);
