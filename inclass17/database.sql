--create university database
CREATE DATABASE `lectureDB`;

-- create students table
CREATE TABLE `Customers`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `lastName`      varchar(80) NOT NULL,
    primary key (`id`)
);

insert into `Customers`(firstName, lastName)
values ('Tunkara', 'Mariyam');
insert into students (firstName, lastName)
values ('Sheri', 'James');
