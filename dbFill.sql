create database if not exists grocart;

/*Before importing the database, do not forget to run migrating if the Authentication module is implemented.*/

create table items
(
    id     int auto_increment primary key not null unique,
    name   varchar(64)                    not null,
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
)
