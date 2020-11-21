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
    id      int primary key not null,
    item_id int             not null,
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
VALUES ('Milk', 'Apro', 1, 'Almond version'),
       ('Chocolate Chip Cookies', 'Traders Joe', 0.200, 'Dark Chocolate'),
       ('Tiger bread', 'Vereyecken', 0.300, 'Gluten-free');
insert into items(name, brand, note)
values ('Beer', 'Stella', 'Six pack; bottles'),
       ('Toilet Paper', 'Generic Company', '3 layers'),
       ('Beer', 'Maes', 'Six pack; bottles'),
       ('Beer', 'Cara', 'Six pack; bottles'),
       ('Beer', 'Jupiler', 'Six pack; bottles'),
       ('Beer', 'Desperados', 'Six pack; bottles'),
       ('Shots', 'Flugel', 'Six pack; bottles');
insert into items(name)
values ('Milk'),
       ('Bread'),
       ('Beer'),
       ('Tomatoes'),
       ('apples'),
       ('pears'),
       ('citrus'),
       ('Celery'),
       ('Zucchini'),
       ('Oranges');
insert into items(name, weight)
values ('Gura Bread', 0.300),
       ('American Special', 0.250),
       ('Salami', 0.150),
       ('Minced Meat', 2),
       ('Bradwurst', 0.300);

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
