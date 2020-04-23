DROP DATABASE IF EXISTS ShortCircuit;
CREATE DATABASE ShortCircuit;
USE ShortCircuit;

CREATE TABLE User (
    UserID varchar (20) PRIMARY KEY NOT NULL,
    UserFirstName varchar (50) NULL,
    UserLastName varchar (50) NULL,
    UserEmail varchar (255) NOT NULL,
    UserPassword varchar (255) NOT NULL,
    ProfileDesc varchar (255) NULL,
    ProfilePic varchar(255) NULL,
    IsAdmin boolean NOT NULL,
    IsBanned boolean NOT NULL
);

CREATE TABLE Post (
    PostID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PostTitle varchar (50) NOT NULL,
    PostDesc varchar (255) NULL,
    PostImage varchar (255) NOT NULL,
    PostLikes INT NULL,
    PostTime DATE NOT NULL,
    IsPinned boolean NOT NULL,
    UserID varchar(20) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User (UserID)
);

CREATE TABLE MediaFile (
    MediaFileID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    MediaFileName varchar (255) NULL,
    MediaFileURL varchar (255) NULL,
    PostID int NOT NULL,
    FOREIGN KEY (PostID) REFERENCES Post (PostID)
);

CREATE TABLE Comment (
    CommentID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CmtAttachement varchar (255),
    CommentTimeStamp TIMESTAMP NOT NULL,
    CommentText varchar (255),
    CommentStyle varchar (255),
    UserID varchar(20) NOT NULL,
    PostID int NOT NULL,
    FOREIGN KEY (PostID) REFERENCES Post (PostID),
    FOREIGN KEY (UserID) REFERENCES User (UserID)
);

INSERT INTO User (UserID, UserFirstName, UserLastName, UserEmail, UserPassword, ProfileDesc, ProfilePic, IsAdmin, IsBanned)
VALUES (
    'Bbaggz',
    'Bilbo',
    'Baggins',
    'bilbo@backend.edu',
    'hunter2',
    'I eat dirt, and dance with my friends',
    'https://i.pinimg.com/originals/2f/97/8e/2f978e10bc6c1e71316e586e05017a8e.jpg',
    '1',
    '0'
);

INSERT INTO User (UserID, UserFirstName, UserLastName, UserEmail, UserPassword, ProfileDesc, ProfilePic, IsAdmin, IsBanned)
VALUES (
    'HelloItIsMeJohnFaxe!',
    'John John',
    'Faxe Jensen',
    'futbol@danmark.dk',
    'hunter2',
    'I am kick de ball. PC funny :)',
    'https://pbs.twimg.com/media/CYnPUnkWcAAUBxK.jpg',
    '0',
    '1'
);

INSERT INTO Post (PostTitle, PostDesc, PostImage, PostLikes, PostTime, UserID, IsPinned)
VALUES (
    'My first build',
    'I just really like the golden color #precious #beginner',
    'https://i.ytimg.com/vi/V18eUOLW7Kk/maxresdefault.jpg',
    4,
    '2020/05/03',
    'Bbaggz',
    1
);

INSERT INTO Post (PostTitle, PostDesc, PostImage, PostLikes, PostTime, UserID, IsPinned)
VALUES (
    'Hello! How do I use this site? I\'m not good at PC',
    'I just really like the golden color #precious #beginner',
    'https://i.imgur.com/0skJjHK.jpg',
    5, 
    '2020/04/03',
    'HelloItIsMeJohnFaxe!',
    0
);

INSERT INTO Comment (UserID, CommentTimeStamp, CommentText, PostID)
VALUES (
    'Bbaggz',
    '2020/04/03',
    'I really Like this post!!!',
    1
);

INSERT INTO Comment (UserID, CommentTimeStamp, CommentText, PostID)
VALUES (
    'Bbaggz',
    '2020/04/05',
    'This is amazing',
    1
);

INSERT INTO Comment (UserID, CommentTimeStamp, CommentText, PostID)
VALUES (
    'Bbaggz',
    '2020/04/05',
    'Awesome',
    2
);

INSERT INTO Comment (UserID, CommentTimeStamp, CommentText, PostID)
VALUES (
    'HelloItIsMeJohnFaxe!',
    '2020/04/05',
    'Hello',
    2
);