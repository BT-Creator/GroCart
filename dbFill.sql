create database if not exists grocart;

/*Before importing the database, do not forget to run migrating if the Authentication module is implemented.*/

create table items
(
    id       int auto_increment primary key not null unique,
    name     varchar(64)                    not null,
    brand    varchar(64)                    null,
    weight   double                         null,
    note     longtext                       null,
    order_id int                            not null,
    foreign key (order_id) references orders (id)
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

create table orders
(
    id             int auto_increment primary key                                                        not null unique,
    picking_method varchar(64)                                                                           null,
    delivery_notes longtext                                                                              null,
    medical_notes  longtext                                                                              null,
    status         enum ('draft', 'ordered', 'assigned_to_driver', 'picking', 'delivering', 'completed') not null,
    delivery_id    int                                                                                   not null,
    store_id       int                                                                                   not null,
    foreign key (delivery_id) references deliveries (id),
    foreign key (store_id) references stores (id)
);

insert into items(name, brand, weight, note, order_id)
VALUES ('Milk', 'Apro', 1, 'Almond version', 1),
       ('Chocolate Chip Cookies', 'Traders Joe', 0.200, 'Dark Chocolate', 2),
       ('Tiger bread', 'Vereyecken', 0.300, 'Gluten-free', 3),
       ('Chicken Breast', 'KFP', 0.600, 'Without hamstrings', 4);
insert into items(name, brand, note, order_id)
values ('Beer', 'Stella', 'Six pack; bottles', 1),
       ('Toilet Paper', 'Generic Company', '3 layers', 1),
       ('Beer', 'Maes', 'Six pack; bottles', 2),
       ('Beer', 'Cara', 'Six pack; bottles', 2),
       ('Beer', 'Jupiler', 'Six pack; bottles', 3),
       ('Beer', 'Desperados', 'Six pack; bottles', 3),
       ('Shots', 'Flugel', 'Six pack; bottles', 4),
       ('Cola', 'Coca-Cola', 'Palet of cans', 4);
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
       ('Oranges', 2);
insert into items(name, weight, order_id)
values ('Gura Bread', 0.300, 1),
       ('American Special', 0.250, 1),
       ('Salami', 0.150, 2),
       ('Minced Meat', 2, 3),
       ('Bradwurst', 0.300, 4);

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
