
CREATE TABLE `user`
(
    `userID`    int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `lastname`      varchar(80) NOT NULL,
    primary key (`userID`)
);

CREATE TABLE `userComments` (
    `CommentID` INT(11) NOT NULL AUTO_INCREMENT,
    `userName` VARCHAR(80) NOT NULL,
    `comment` TEXT NOT NULL,
    FOREIGN KEY (`CommentID`) REFERENCES `user`(`userID`)
);

INSERT INTO `user`(`userID`, `name`, `lastname`) VALUES ('1','Zana','Tan');
INSERT INTO `user`(`userID`, `name`, `lastname`) VALUES ('2','mal','sal');
INSERT INTO `user`(`userID`, `name`, `lastname`) VALUES ('3','fam','familia');
INSERT INTO `user`(`userID`, `name`, `lastname`) VALUES ('4','ami','lia');


INSERT INTO `userComments`(`name`, `Comment`, `CommentID`) VALUES ('Zana','I love this class','1');
INSERT INTO `userComments`(`name`, `Comment`, `CommentID`) VALUES ('mal','the weather is beautiful','2');
INSERT INTO `userComments`(`name`, `Comment`, `CommentID`) VALUES ('fam','family is important','3');


-- a. Write a query to return all users and their comments if they have comments or not. --
SELECT 
    user.userID,
    user.name,
    user.lastname,
    userComments.commentID,
    userComments.comment
FROM `user` 
LEFT JOIN `userComments` ON user.userID = userComments.CommentID;

-- b. Write a query to return all users and their comments only if they have comments. --
SELECT 
    user.userID,
    user.name,
    user.lastname,
    userComments.commentID,
    userComments.comment
FROM `user` 
INNER JOIN `userComments` ON user.userID = userComments.CommentID

