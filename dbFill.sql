create database if not exists grocart;

/*Before importing the database, do not forget to run migrating if the Authentication module is implemented.*/

create table items
(
    id     int auto_increment primary key not null unique,
    name   varchar(64)                    not null,
    brand  varchar(64)                    null,
    weight double                         null,
    note   longtext                       null
);

create table stores
(
    id           int auto_increment primary key not null unique,
    street       varchar(64)                    not null,
    house_number varchar(6)                     not null,
    postal_code  varchar(8)                     not null,
    city         varchar(64)                    not null,
    country      varchar(64)                    not null
);

create table deliveries
(
    id           int auto_increment primary key not null unique,
    street       varchar(64)                    not null,
    house_number varchar(6)                     not null,
    postal_code  varchar(8)                     not null,
    city         varchar(64)                    not null,
    country      varchar(64)                    not null
);

create table grocerylists
(
    id      int auto_increment primary key not null unique,
    item_id int                            not null,
    foreign key (item_id) references items (id)
);

create table orders
(
    id             int auto_increment primary key                                                        not null unique,
    delivery_notes longtext                                                                              null,
    medical_notes  longtext                                                                              null,
    status         enum ('draft', 'ordered', 'assigned_to_driver', 'picking', 'delivering', 'completed') not null,
    delivery_id    int                                                                                   not null,
    store_id       int                                                                                   not null,
    grocerylist_id int                                                                                   not null,
    foreign key (delivery_id) references deliveries (id),
    foreign key (store_id) references stores (id),
    foreign key (grocerylist_id) references grocerylists (id)
);

insert into items(name, brand, weight, note)
VALUES ('Milk', 'Apro', 1, 'Almond version'), ('Chocolate Chip Cookies', 'Traders Joe', 0.200, 'Dark Chocolate'), ('Tiger bread', 'Vereyecken', 0.300, 'Gluten-free');
insert into items(name, brand, note)
values ('Beer', 'Stella', 'Six pack; bottles'), ('Toilet Paper', 'Generic Company', '3 layers'), ('Beer', 'Maes', 'Six pack; bottles'), ('Beer', 'Cara', 'Six pack; bottles'), ('Beer', 'Jupiler', 'Six pack; bottles'), ('Beer', 'Desperados', 'Six pack; bottles'), ('Shots', 'Flugel', 'Six pack; bottles');
insert into items(name)
values ('Milk'), ('Bread'), ('Beer'), ('Tomatoes'), ('apples'), ('pears'), ('citrus'), ('Celery'), ('Zucchini'), ('Oranges');
insert into items(name, weight)
values ('Gura Bread', 0.300), ('American Special', 0.250), ('Salami', 0.150), ('Minced Meat', 2), ('Bradwurst', 0.300);
