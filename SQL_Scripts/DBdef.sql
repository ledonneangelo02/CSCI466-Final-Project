#############################################
#	This Script will generate the       #
#   Song table and fill it with information #
#############################################
DROP TABLE Enqueues;
DROP TABLE Contributes;
DROP TABLE Performs;
DROP TABLE Person;
DROP TABLE Queue;
DROP TABLE KaraokeFile;
DROP TABLE Role;
DROP TABLE Artist;
DROP TABLE Song;

CREATE TABLE Song (

	ID          INT(3)          PRIMARY KEY AUTO_INCREMENT,
	Name        VARCHAR(100)    NOT NULL,
	MainArtist  VARCHAR(100)    NOT NULL,
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
	ID            INT(3)        PRIMARY KEY AUTO_INCREMENT,
     	File          VARCHAR(50)   NOT NULL 	
);

CREATE TABLE Queue
(
	ID     INT(3)  PRIMARY KEY AUTO_INCREMENT,
	IsPaid CHAR(1) NOT NULL DEFAULT 'N'
);

CREATE TABLE Person
(
	ID             INT(3)        PRIMARY KEY AUTO_INCREMENT,
	IsTheDJ        CHAR(1)       DEFAULT 'N',
	FirstName      VARCHAR(30)   NOT NULL,
	Email          VARCHAR(200), 
	LastName       VARCHAR(30),
	AddressLine1   VARCHAR(100),
	AddressLine2   VARCHAR(100)
);

CREATE TABLE Performs
(
	ArtistID  INT(3) NOT NULL, 
	KarFileID INT(3) NOT NULL,
	SongID    INT(3) NOT NULL,
	Lyrics    VARCHAR(7) NOT NULL,

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
	DateAndTime DATETIME NOT NULL,

	PRIMARY KEY (SongID, RoleID, ArtistID, DateAndTime),

  	FOREIGN KEY (ArtistID) REFERENCES Artist(ID),
	FOREIGN KEY (RoleID)   REFERENCES Role(ID),
	FOREIGN KEY (SongID)   REFERENCES Song(ID)

);

CREATE TABLE Enqueues
(
	KarFileID   INT(3) NOT NULL,
	PersonID    INT(3) NOT NULL,
	QueueID     INT(3) NOT NULL,
	DateAndTime DATETIME NOT NULL,
        PRIMARY KEY (KarFileID, PersonID, QueueID, DateAndTime),
        
        FOREIGN KEY (KarFileID) REFERENCES KaraokeFile(ID),
        FOREIGN KEY (PersonID)  REFERENCES Person(ID),
        FOREIGN KEY (QueueID)   REFERENCES Queue(ID)

);

\. SongInsert.sql
\. ArtistInsert.sql
