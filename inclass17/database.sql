--create university database
CREATE DATABASE `lectureDB`;

-- create students table
CREATE TABLE `students`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `lastName`      varchar(80) NOT NULL,
    primary key (`id`)
);

CREATE TABLE `classes`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `code`      varchar(80) NOT NULL,
    primary key (`id`)
);

-- ALTER TABLE students ADD Email varchar(255);
-- ALTER TABLE students DROP COLUMN Email;

-- seed some test data
insert into students (firstName, lastName)
values ('Bethany', 'Shaw');
insert into students (firstName, lastName)
values ('Sheri', 'Fitzgerald');


insert into classes (name)
values ('CISC 1000');
insert into students (name)
values ('CISC 3300');

-- some example queries

-- select all from students
select * from students;

-- select certain columns from students
select id, name from students;

-- select all from students where name equals something
select * from students where firstName = 'Bethany';

select * from students where id = 1 and firstName = 'Bethany';

select * from students where id = 999 or firstName = 'Bethany';

-- select all from students where name contains Shaw;
select * from students where name like '%Shaw%';

-- select all from students order by name, order by name descending(last to first)
select * from students order by name;
select * from students order by name desc;

-- limit and offset
select * from students limit 2;
select * from students limit 2 offset 2;

-- update
update student SET firstName = 'pinecone' where id = 1;

-- delete

delete student where id = 1;
