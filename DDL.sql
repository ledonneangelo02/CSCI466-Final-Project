CREATE TABLE Song
(
    ID varchar(20) PRIMARY KEY,
    CoverArt varchar(250),
    Title varchar(50) NOT NULL,
    Genre varchar(50) NOT NULL,
    Duration INT
);


CREATE TABLE Artist
(
    ID varchar(20) PRIMARY KEY,
    Name varchar(50) NOT NULL,
    Assoc varchar(50),
    Band varchar(50)
);


CREATE TABLE Role
(
    ID varchar(20) PRIMARY KEY,
    Type varchar(50) NOT NULL
);


CREATE TABLE KaraokeFile
(
    ID varchar(20) PRIMARY KEY,
    FileLocation varchar(50)
);


CREATE TABLE Queue
(
    ID varchar(20) PRIMARY KEY
);


CREATE TABLE Person
(
    ID varchar(20) PRIMARY KEY,
    Email varchar(100),
    FirstName varchar(50),
    LastName varchar(50),
    AddressLine1 varchar(100),
    AddressLine2 varchar(100)
);


CREATE TABLE Client
(
    ID varchar(20) PRIMARY KEY,
    Email varchar(100),
    FirstName varchar(50),
    LastName varchar(50),
    AddressLine1 varchar(100),
    AddressLine2 varchar(100)
);


CREATE TABLE DJ
(
    ID varchar(20) PRIMARY KEY,
    Email varchar(100),
    FirstName varchar(50),
    LastName varchar(50),
    AddressLine1 varchar(100),
    AddressLine2 varchar(100)
);


CREATE TABLE Priority
(
    ID varchar(20) PRIMARY KEY
);


CREATE TABLE FFA
(
    ID varchar(20) PRIMARY KEY
);


CREATE TABLE AssociatedWith
(
    Artist_Identifier varchar(20) NOT NULL,
    KF_Identifier varchar(20) NOT NULL,
    Song_Identifier varchar(20),
    Lyrics varchar(120),

    PRIMARY KEY (Artist_Identifier, KF_Identifier),
    FOREIGN KEY (Artist_Identifier) REFERENCES Artist(ID),
    FOREIGN Key (KF_Identifier) REFERENCES KaraokeFile(ID),
    FOREIGN KEY (Song_Identifier) REFERENCES Song(ID)
);


CREATE TABLE Contributes
(
    Song_Identifier varchar(20) NOT NULL,
    Role_Identifier varchar(20) NOT NULL,
    Artist_Identifier varchar(20) NOT NULL,
    Date DATE,

    PRIMARY KEY (Song_Identifier, Role_Identifier, Artist_Identifier),
    FOREIGN KEY (Song_Identifier) REFERENCES Song(ID),
    FOREIGN KEY (Role_Identifier) REFERENCES Role(ID),
    FOREIGN Key (Artist_Identifier) REFERENCES Artist(ID)
);


CREATE TABLE Enqueues 
(
    KF_Identifier varchar(20) NOT NULL,
    Person_Identifier varchar(20) NOT NULL,
    Queue_Identifier varchar(20) NOT NULL,
    Date DATETIME,
    Price INT,
    Dequeued varchar(50),

    PRIMARY KEY (KF_Identifier, Person_Identifier, Queue_Identifier),
    FOREIGN KEY (KF_Identifier) REFERENCES KaraokeFile(ID),
    FOREIGN KEY (Person_Identifier) REFERENCES Person(ID),
    FOREIGN KEY (Queue_Identifier) REFERENCES Queue(ID)
);