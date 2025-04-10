CREATE DATABASE `homework10`;

CREATE TABLE `Henna`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `item`      varchar(80) NOT NULL,
    `price`     varchar (80) NOT NULL,
    primary key (`id`)

);

insert into Henna (item, price)
values ('Glitter Henna', '14.99');

insert into Henna (item, price)
values ('Black Henna', '9.99');

insert into Henna (item, price)
values ('Red Henna', '11.99');

insert into Henna (item, price)
values ('Jagua Jel', '20.99');
