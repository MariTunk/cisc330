--create table --
CREATE TABLE `notes` 
(
  `notesID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `description` text NOT NULL,
   primary key (`notesID`) 
);

-- insert into table --
INSERT INTO `notes`(`notesID`, `title`, `description`) values('1', 'Introduction', 'My name is james i am writing on a laptop');
INSERT INTO `notes`(`notesID`, `title`, `description`) values('2', 'talks', 'I have an amazon package comming in today!');
INSERT INTO `notes`(`notesID`, `title`, `description`) values('3', 'Weather', 'The sky looks like an oil painting');
INSERT INTO `notes`(`notesID`, `title`, `description`) values('4', 'Pizza', 'I would like a large pepper and pinapple pizza ');

-- update data into table -- 
UPDATE `notes`
SET 
    `title` = 'Cars', 
    `description` = 'Jump in a cadilac'
WHERE 
    `notesID` = 1;  


UPDATE `notes`
SET 
    `title` = 'numbers', 
    `description` = 'the numbers game is so fun '
WHERE 
    `notesID` = 4;  

UPDATE `notes`
SET 
    `title` = 'student', 
    `description` = 'the semester is almost overr'
WHERE 
    `notesID` = 3;  

-- delete from table --
DELETE FROM notes WHERE notesid = 1;
DELETE FROM notes WHERE notesid = 4;


-- a. select all notes and order them by name in reverse alphabetical order-- 
SELECT *  
FROM `notes`  
ORDER BY `title` DESC; 

-- b. select the second note in the table only, assume that you don’t know the ID number of it--
SELECT *
FROM notes
ORDER BY notesID
LIMIT 1 OFFSET 1;

-- c select all notes that have descriptions which contain vowels -- 
SELECT *  
FROM `notes`  
WHERE `description` REGEXP '[aeiouAEIOU]';

