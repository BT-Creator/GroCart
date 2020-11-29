create database if not exists grocart;

/*Before importing the database, do not forget to run migrating if the Authentication module is implemented.*/
use grocart;

set foreign_key_checks = 0;
drop table if exists deliveries;
drop table if exists stores;
drop table if exists orders;
drop table if exists items;
set foreign_key_checks = 1;

create table if not exists items
(
    id       int auto_increment primary key not null unique,
    name     varchar(64)                    not null,
    brand    varchar(64)                    null,
    weight   double                         null,
    note     longtext                       null,
    order_id int                            not null
);

create table if not exists stores
(
    id           int auto_increment primary key not null unique,
    street       varchar(64)                    not null,
    house_number varchar(6)                     not null,
    postal_code  varchar(8)                     not null,
    city         varchar(64)                    not null,
    country      varchar(64)                    not null
);

create table if not exists deliveries
(
    id           int auto_increment primary key not null unique,
    street       varchar(64)                    not null,
    house_number varchar(6)                     not null,
    postal_code  varchar(8)                     not null,
    city         varchar(64)                    not null,
    country      varchar(64)                    not null
);

create table if not exists orders
(
    id             int auto_increment primary key                                                        not null unique,
    picking_method varchar(64)                                                                           null,
    delivery_notes longtext                                                                              null,
    medical_notes  longtext                                                                              null,
    status         enum ('draft', 'ordered', 'assigned_to_driver', 'picking', 'delivering', 'completed') not null,
    delivery_id    int                                                                                   not null,
    store_id       int                                                                                   not null,
    user_id        int                                                                                   not null
);

ALTER TABLE items
    ADD foreign key (order_id) references orders (id);

ALTER TABLE orders
    ADD foreign key (delivery_id) references deliveries (id);

ALTER TABLE orders
    ADD foreign key (store_id) references stores (id);

insert into stores(street, house_number, postal_code, city, country)
VALUES ('Haag Pines', '1855', '82792-01', 'Port Muhammadhaven', 'Guernsey'),
       ('Lind Tunnel', '32567', '66108', 'Gerlachland', 'Mozambique'),
       ('Jenkins Overpass', '6912', '59150-12', 'Jacobsmouth', 'Cayman Islands'),
       ('Bernard Drive', '8911', '55690-21', 'South Angelaland', 'Cook Islands'),
       ('Niko Roads', '006', '23353', 'New Jalynland', 'French Guiana'),
       ('Eugenia Inlet', '53030', '52153-01', 'West Celestine', 'Yemen'),
       ('Garrick Wells', '60359', '19565-21', 'Schmitttown', 'Cameroon'),
       ('Jess Spurs', '1502', '50858-17', 'Elmoview', 'Canada'),
       ('Deonte Terrace', '39978', '65324-38', 'Richardstad', 'Seychelles'),
       ('Jessy Tunnel', '847', '37891-10', 'Port Elliston', 'Uruguay');

insert into deliveries(street, house_number, postal_code, city, country)
VALUES ('Ward Wells', '17754', '57485', 'Veummouth', 'Malaysia'),
       ('Lina Burgs', '387', '93143', 'East Dayana', 'Haiti'),
       ('McClure Trafficway', '181', '47364-15', 'Brendanview', 'Philippines'),
       ('Spinka Club', '232', '90786', 'Norrisburgh', 'Uganda'),
       ('Thalia Parks', '927', '15467', 'Lake Annabelmouth', 'Equatorial Guinea'),
       ('Eveline Forge', '7251', '47910', 'Hegmannburgh', 'Macao'),
       ('Rosenbaum Island', '4974', '61093', 'East Carlee', 'Slovenia'),
       ('Rutherford Haven', '052', '27619', 'East Clarabellechester', 'Tunisia'),
       ('Dave Shoals', '16024', '64725-31', 'Muellertown', 'Timor-Leste'),
       ('Ramon Brook', '743', '79762-55', 'Eddton', 'French Guiana');

insert into orders(picking_method, delivery_notes, status, delivery_id, store_id, user_id)
VALUES ('As cheap as possible', 'Go to the back entrance and leave it at the door.', 'draft', 1, 3, 1);

insert into orders(picking_method, delivery_notes, medical_notes, status, delivery_id, store_id, user_id)
VALUES ('Highest Quality', 'Ring the bell and leave the box at the door.', 'Allergic to nuts', 'draft', 3, 6, 1);

insert into orders(picking_method, status, delivery_id, store_id, user_id)
VALUES ('Cheapest', 'draft', 4, 5, 1);

insert into orders(picking_method, delivery_notes, status, delivery_id, store_id, user_id)
VALUES ('As cheap as possible', 'Go to the back entrance and leave it at the door.', 'ordered', 9, 8, 1),
       ('Best value', 'Leave at the front door', 'draft', 2, 4, 1),
       ('As cheap as possible', 'Go to the back entrance and leave it at the door.', 'assigned_to_driver', 4, 2, 1),
       ('As cheap as possible', 'Go to the back entrance and leave it at the door.', 'picking', 9, 8, 1),
       ('As cheap as possible', 'Go to the back entrance and leave it at the door.', 'delivering', 9, 8, 1),
       ('As cheap as possible', 'Go to the back entrance and leave it at the door.', 'completed', 9, 8, 1);

insert into orders(picking_method, delivery_notes, medical_notes, status, delivery_id, store_id, user_id)
VALUES ('Highest Quality', 'Ring the bell and leave the box at the door.', 'Allergic to nuts', 'ordered', 7, 8, 1),
       ('Highest Quality', 'Ring the bell and leave the box at the door.', 'Allergic to nuts', 'assigned_to_driver', 7,
        8, 1),
       ('Highest Quality', 'Ring the bell and leave the box at the door.', 'Allergic to nuts', 'picking', 7, 8, 1),
       ('Highest Quality', 'Ring the bell and leave the box at the door.', 'Allergic to nuts', 'delivering', 7, 8, 1),
       ('Highest Quality', 'Ring the bell and leave the box at the door.', 'Allergic to nuts', 'completed', 7, 8, 1);

insert into orders(picking_method, status, delivery_id, store_id, user_id)
VALUES ('Cheapest', 'draft', 7, 1, 1),
       ('Cheapest', 'assigned_to_driver', 7, 1, 1),
       ('Cheapest', 'picking', 7, 1, 1),
       ('Cheapest', 'delivering', 7, 1, 1),
       ('Cheapest', 'completed', 7, 1, 1);

insert into items(name, brand, weight, note, order_id)
VALUES ('Milk', 'Apro', 1, 'Almond_version', 1),
       ('Chocolate_Chip_Cookies', 'Traders_Joe', 0.200, 'Dark_Chocolate', 2),
       ('Tiger_bread', 'Vereyecken', 0.300, 'Gluten-free', 3),
       ('Chicken_Breast', 'KFP', 0.600, 'Without hamstrings', 4),
       ('Milk', 'Apro', 1, 'Almond_version', 5),
       ('Chocolate_Chip_Cookies', 'Traders_Joe', 0.200, 'Dark_Chocolate', 6),
       ('Tiger_bread', 'Vereyecken', 0.300, 'Gluten-free', 7),
       ('Chicken_Breast', 'KFP', 0.600, 'Without_hamstrings', 8),
       ('Milk', 'Apro', 1, 'Almond_version', 9),
       ('Chocolate_Chip_Cookies', 'Traders_Joe', 0.200, 'Dark_Chocolate', 10),
       ('Tiger_bread', 'Vereyecken', 0.300, 'Gluten-free', 11),
       ('Chicken_Breast', 'KFP', 0.600, 'Without_hamstrings', 12),
       ('Milk', 'Apro', 1, 'Almond_version', 13),
       ('Chocolate_Chip_Cookies', 'Traders_Joe', 0.200, 'Dark_Chocolate', 14),
       ('Tiger_bread', 'Vereyecken', 0.300, 'Gluten-free', 15),
       ('Chicken_Breast', 'KFP', 0.600, 'Without_hamstrings', 16),
       ('Milk', 'Apro', 1, 'Almond_version', 17),
       ('Chocolate_Chip_Cookies', 'Traders_Joe', 0.200, 'Dark_Chocolate', 18);


insert into items(name, brand, note, order_id)
values ('Beer', 'Stella', 'Six pack;_bottles', 1),
       ('Toilet_Paper', 'Generic_Company', '3_layers', 1),
       ('Beer', 'Maes', 'Six pack;_bottles', 2),
       ('Beer', 'Cara', 'Six pack;_bottles', 2),
       ('Beer', 'Jupiler', 'Six pack;_bottles', 3),
       ('Beer', 'Desperados', 'Six pack;_bottles', 3),
       ('Shots', 'Flugel', 'Six pack;_bottles', 4),
       ('Cola', 'Coca-Cola', 'Palet_of_cans', 4),
       ('Beer', 'Stella', 'Six pack;_bottles', 5),
       ('Toilet_Paper', 'Generic_Company', '3_layers', 5),
       ('Beer', 'Maes', 'Six pack;_bottles', 6),
       ('Beer', 'Cara', 'Six pack;_bottles', 6),
       ('Beer', 'Jupiler', 'Six pack;_bottles', 7),
       ('Beer', 'Desperados', 'Six pack;_bottles', 7),
       ('Shots', 'Flugel', 'Six pack;_bottles', 8),
       ('Cola', 'Coca-Cola', 'Palet_of_cans', 8),
       ('Beer', 'Stella', 'Six pack;_bottles', 9),
       ('Toilet_Paper', 'Generic_Company', '3_layers', 9),
       ('Beer', 'Maes', 'Six pack;_bottles', 10),
       ('Beer', 'Cara', 'Six pack;_bottles', 10),
       ('Beer', 'Jupiler', 'Six pack;_bottles', 11),
       ('Beer', 'Desperados', 'Six pack;_bottles', 11),
       ('Shots', 'Flugel', 'Six pack;_bottles', 12),
       ('Cola', 'Coca-Cola', 'Palet_of_cans', 12),
       ('Beer', 'Stella', 'Six pack;_bottles', 13),
       ('Toilet Paper', 'Generic_Company', '3_layers', 13),
       ('Beer', 'Maes', 'Six pack;_bottles', 14),
       ('Beer', 'Cara', 'Six pack;_bottles', 14),
       ('Beer', 'Jupiler', 'Six pack;_bottles', 15),
       ('Beer', 'Desperados', 'Six pack;_bottles', 15),
       ('Shots', 'Flugel', 'Six pack;_bottles', 16),
       ('Cola', 'Coca-Cola', 'Palet_of_cans', 16),
       ('Beer', 'Stella', 'Six pack;_bottles', 17),
       ('Toilet_Paper', 'Generic_Company', '3_layers', 17),
       ('Beer', 'Maes', 'Six pack;_bottles', 18),
       ('Beer', 'Cara', 'Six pack;_bottles', 18);

insert into items(name, order_id)
values ('Milk', 1),
       ('Bread', 1),
       ('Beer', 2),
       ('Tomatoes', 2),
       ('apples', 3),
       ('pears', 3),
       ('citrus', 4),
       ('Celery', 4),
       ('Zucchini', 1),
       ('Oranges', 2),
       ('Milk', 4),
       ('Bread', 4),
       ('Beer', 5),
       ('Tomatoes', 5),
       ('apples', 6),
       ('pears', 6),
       ('citrus', 7),
       ('Celery', 7),
       ('Zucchini', 8),
       ('Oranges', 8),
       ('Milk', 9),
       ('Bread', 9),
       ('Beer', 10),
       ('Tomatoes', 10),
       ('apples', 11),
       ('pears', 11),
       ('citrus', 12),
       ('Celery', 12),
       ('Zucchini', 13),
       ('Oranges', 13),
       ('Milk', 14),
       ('Bread', 14),
       ('Beer', 15),
       ('Tomatoes', 15),
       ('apples', 16),
       ('pears', 16),
       ('citrus', 17),
       ('Celery', 17),
       ('Zucchini', 18),
       ('Oranges', 18);

insert into items(name, weight, order_id)
values ('Gura_Bread', 0.300, 1),
       ('American_Special', 0.250, 1),
       ('Salami', 0.150, 2),
       ('Minced_Meat', 2, 3),
       ('Bradwurst', 0.300, 4),
       ('Gura_Bread', 0.300, 5),
       ('American_Special', 0.250, 6),
       ('Salami', 0.150, 7),
       ('Minced_Meat', 2, 8),
       ('Bradwurst', 0.300, 9),
       ('Gura_Bread', 0.300, 10),
       ('American_Special', 0.250, 11),
       ('Salami', 0.150, 12),
       ('Minced_Meat', 2, 13),
       ('Bradwurst', 0.300, 14),
       ('Gura_Bread', 0.300, 15),
       ('American_Special', 0.250, 16),
       ('Salami', 0.150, 17),
       ('Minced_Meat', 2, 18),
       ('Bradwurst', 0.300, 18);
