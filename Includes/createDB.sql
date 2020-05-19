DROP DATABASE IF EXISTS ShortCircuit;
CREATE DATABASE ShortCircuit;
USE ShortCircuit;

CREATE TABLE user (
    UserID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    UserName varchar (20) NOT NULL,
    UserFirstName varchar (50) NOT NULL,
    UserLastName varchar (50) NOT NULL,
    UserEmail varchar (255) NOT NULL,
    UserPassword varchar (255) NOT NULL,
    ProfileDesc varchar (255) NULL,
    ProfilePic varchar(255) NULL,
    IsAdmin boolean NOT NULL DEFAULT 0,
    IsBanned boolean NOT NULL DEFAULT 0
);

CREATE TABLE post (
    PostID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PostTitle varchar (50) NOT NULL,
    PostDesc varchar (255) NULL,
    PostImage varchar (255) NOT NULL,
    PostLikes INT NULL,
    PostTime TIMESTAMP NOT NULL,
    IsPinned boolean NOT NULL DEFAULT 0,
    UserID INT NOT NULL,
    FOREIGN KEY (UserID) REFERENCES user (UserID)
);

CREATE TABLE textstyling(
    TextStylingID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    TextStylingName varchar (50) NOT NULL,
    TextStylingColor varchar (50) NOT NULL,
    TextStylingFont varchar (50) NOT NULL
);

CREATE TABLE comment (
    CommentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CmtAttachement varchar (255),
    CommentTimeStamp TIMESTAMP NOT NULL,
    CommentText varchar (255),
    UserID INT NOT NULL,
    PostID INT NOT NULL,
    TextStylingID INT,
    FOREIGN KEY (PostID) REFERENCES post (PostID) ON DELETE CASCADE,
    FOREIGN KEY (UserID) REFERENCES user (UserID),
    FOREIGN KEY (TextStylingID) REFERENCES textstyling (TextStylingID)
);

CREATE TABLE aboutpage (
    PageID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PageRules TEXT NULL,
    PageDesc TEXT NULL,
    PageContact TEXT NULL
);

INSERT INTO user (UserID, UserName, UserFirstName, UserLastName, UserEmail, UserPassword, ProfileDesc, ProfilePic, IsAdmin, IsBanned)
VALUES (
    '1',	
    'user',
    'user',
    'lastname',	
    'user@users.com',
    '$2y$05$NpI7PKpa6IeLM7e9DhReb.hLlWLVrg46QRd6YKEX7Kpy12p0w.Kgy',
    'Dette er en beskrivelse',
    'NULL',
    '0',
    '0'
);

INSERT INTO user (UserID, UserName, UserFirstName, UserLastName, UserEmail, UserPassword, ProfileDesc, ProfilePic, IsAdmin, IsBanned)
VALUES (
    '2',	
    'admin',
    'admin',
    'admin lastname',		
    'admin@admin.com',
    '$2y$05$NpI7PKpa6IeLM7e9DhReb.hLlWLVrg46QRd6YKEX7Kpy12p0w.Kgy',
    'Dette er en beskrivelse til admin',
    'NULL',
    '1',
    '0'
);

INSERT INTO post (PostTitle, PostDesc, PostImage, PostLikes, PostTime, IsPinned, UserID)
VALUES (
    'My First Intel Build',
    'Er dette et godt build?',
    'NULL',
    '2',
    '2020-05-10 00:00:00',
    '0',
    '1'
);

INSERT INTO post (PostTitle, PostDesc, PostImage, PostLikes, PostTime, IsPinned, UserID)
VALUES (
    'Er Amd eller Intel bedst',
    'Jeg tror personligt det er AMD.',
    'https://i.imgur.com/0skJjHK.jpg',
    '2',
    '2020-04-10 00:00:00',
    '0',
    '1'
);

INSERT INTO textstyling (TextStylingID, TextStylingName, TextStylingColor, TextStylingFont)
VALUES (
   '1',	
   'Regular',
   'csWhite',
   'csRegular'
);

INSERT INTO textstyling (TextStylingID, TextStylingName, TextStylingColor, TextStylingFont)
VALUES (
   '2',	
   'Raging',
   'csRed',
   'csBold'
);

INSERT INTO textstyling (TextStylingID, TextStylingName, TextStylingColor, TextStylingFont)
VALUES (
   '3',	
   'Mystic',
   'csPurple',
   'csItalic'
);

INSERT INTO comment (CmtAttachement, CommentTimeStamp, CommentText, UserID, PostID, TextStylingID)
VALUES (
    'NULL',
    '2020-05-24 12:50:14',
    'Meget Flot',
    '1',
    '1',
    '1'
);

INSERT INTO aboutpage (PageID, PageRules, PageDesc, PageContact)
VALUES ( 
   '1',	 
   'Dette er Pagerules',
   'Dette er PageDesc',
   'Dette er PageKontakt'
);

