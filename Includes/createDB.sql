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
    PostTime TIMESTAMP NOT NULL,
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
    FOREIGN KEY (PostID) REFERENCES Post (PostID) ON DELETE CASCADE,
    FOREIGN KEY (UserID) REFERENCES User (UserID)
);

CREATE TABLE TextStyling(
    TextStylingID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    TextStylingName varchar (50) NOT NULL,
    TextStylingColor varchar (50) NOT NULL,
    TextStylingFont varchar (50) NOT NULL,
    CommentID int NOT NULL,
    FOREIGN KEY (CommentID) REFERENCES Comment (CommentID)
);

CREATE TABLE aboutPage (
    PageID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PageRules TEXT NULL,
    PageDesc TEXT NULL,
    PageContact TEXT NULL,
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
    'John',
    'Faxe Jensen',
    'futbol@danmark.dk',
    'hunter2',
    'I am kick de ball. PC funny :)',
    'https://pbs.twimg.com/media/CYnPUnkWcAAUBxK.jpg',
    '0',
    '1'
);

INSERT INTO Post (PostTitle, PostDesc, PostImage, PostLikes, PostTime, IsPinned, UserID)
VALUES (
    'My First Intel Build',
    'Dette er mit første build',
    'https://i.imgur.com/0skJjHK.jpg',
    '2',
    '2020-04-10 00:00:00',
    '0',
    'Bbaggz'
);

INSERT INTO Comment (CmtAttachement, CommentTimeStamp, CommentText, CommentStyle, UserID, PostID)
VALUES (
    'NULL',
    '2020-04-24 12:50:14',
    'Meget Flot',
    'NULL',
    'HelloItIsMeJohnFaxe!',
    '1'
);
