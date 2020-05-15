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
    IsPinned boolean NOT NULL,
    UserID INT NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User (UserID)
);

CREATE TABLE comment (
    CommentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CmtAttachement varchar (255),
    CommentTimeStamp TIMESTAMP NOT NULL,
    CommentText varchar (255),
    CommentStyle varchar (255),
    UserID INT NOT NULL,
    PostID INT NOT NULL,
    FOREIGN KEY (PostID) REFERENCES Post (PostID) ON DELETE CASCADE,
    FOREIGN KEY (UserID) REFERENCES User (UserID)
);

CREATE TABLE textstyling(
    TextStylingID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    TextStylingName varchar (50) NOT NULL,
    TextStylingColor varchar (50) NOT NULL,
    TextStylingFont varchar (50) NOT NULL,
    CommentID INT NOT NULL,
    FOREIGN KEY (CommentID) REFERENCES Comment (CommentID)
);

CREATE TABLE aboutpage (
    PageID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PageRules TEXT NULL,
    PageDesc TEXT NULL,
    PageContact TEXT NULL
);
