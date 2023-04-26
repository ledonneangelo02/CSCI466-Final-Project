##########################################
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #
#					 #
#  THIS IS A SQL SCRIPT THAT WILL CREATE #
#     THE DDL FOR OUR ENTIRE DATABASE.   #
#					 #
#                                        #
#  This is a SQL Script that will create #
#     the DDL for our entire database.   #
#                                        #
#    By:    Angelo LeDonne z1920784      #
#           Chris Dejong   z1836870      #
#           Mark Southwood z058227       #
#           Milad Jizan    z1943173      #
##########################################

DROP TABLE Enqueues;
DROP TABLE Contributes;
DROP TABLE AssociatedWith;
DROP TABLE DJ;
DROP TABLE Client;
DROP TABLE Person;
DROP TABLE Queue;
DROP TABLE KaraokeFile;
DROP TABLE Role;
DROP TABLE Artist;
DROP TABLE Song;


CREATE TABLE Song (

	ID          INT(3)          PRIMARY KEY AUTO_INCREMENT,
	Name        VARCHAR(100)    NOT NULL,
	Genre       VARCHAR(25),
	SongLen     INT(4)          NOT NULL,
	CoverArt    VARCHAR(200)    NOT NULL
);

CREATE TABLE Artist
(

	ID   INT(3)          PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(120)    NOT NULL,
	Band VARCHAR(120)
);

CREATE TABLE Role
(
	ID       INT(3)       PRIMARY KEY AUTO_INCREMENT,
	RoleType VARCHAR(20)  NOT NULL
);

CREATE TABLE KaraokeFile
(
	ID            INT(3)         PRIMARY KEY AUTO_INCREMENT,
	File          VARCHAR(200)   NOT NULL 	
);

CREATE TABLE Queue
(
	ID          INT(3)            PRIMARY KEY AUTO_INCREMENT,
	IsPaid      CHAR(1)           NOT NULL  DEFAULT 'N',
	AmountPaid  DECIMAL(10,5)     DEFAULT 0,
	Status      INT(1)            NOT NULL  DEFAULT 0
);


CREATE TABLE Person
(
	ID             INT(3)        PRIMARY KEY AUTO_INCREMENT,
	FirstName      VARCHAR(30)   NOT NULL,
	LastName       VARCHAR(30),
	Email          VARCHAR(200), 
	AddressLine1   VARCHAR(100),
	AddressLine2   VARCHAR(100)
);

CREATE TABLE Client
(
	PersonID INT(3) PRIMARY KEY,
	FOREIGN KEY (PersonID) REFERENCES Person(ID)
);

CREATE TABLE DJ
(
	PersonID INT(3) PRIMARY KEY,
	FOREIGN KEY (PersonID) REFERENCES Person(ID)
);

CREATE TABLE AssociatedWith
(
	ArtistID  INT(3) NOT NULL, 
	KarFileID INT(3) NOT NULL,
	SongID    INT(3) NOT NULL,

	PRIMARY KEY (ArtistID, KarFileID),

	FOREIGN KEY (ArtistID) REFERENCES Artist(ID),
	FOREIGN KEY (KarFileID) REFERENCES KaraokeFile(ID),
	FOREIGN KEY (SongID) REFERENCES Song(ID)
);

CREATE TABLE Contributes
(
	SongID      INT(3) NOT NULL,
	RoleID      INT(3) NOT NULL,
	ArtistID    INT(3) NOT NULL,
	DateAndTime DATETIME NOT NULL DEFAULT now(),

	PRIMARY KEY (SongID, RoleID, ArtistID),

  	FOREIGN KEY (ArtistID) REFERENCES Artist(ID),
	FOREIGN KEY (RoleID)   REFERENCES Role(ID),
	FOREIGN KEY (SongID)   REFERENCES Song(ID)

);

CREATE TABLE Enqueues
(
	KarFileID   INT(3) NOT NULL,
	PersonID    INT(3) NOT NULL,
	QueueID     INT(3) NOT NULL,
	DateAndTime DATETIME NOT NULL DEFAULT now(),
	PRIMARY KEY (KarFileID, PersonID, QueueID),

	FOREIGN KEY (KarFileID) REFERENCES KaraokeFile(ID),
	FOREIGN KEY (PersonID)  REFERENCES Person(ID),
	FOREIGN KEY (QueueID)   REFERENCES Queue(ID)

);

\. SongInsert.sql
\. ArtistInsert.sql
\. PersonInsert.sql
\. RoleInsert.sql
\. KFInsert.sql
\. AssociatedWithInsert.sql
\. ContributesInsert.sql
\. EnqueuesInsert.sql

