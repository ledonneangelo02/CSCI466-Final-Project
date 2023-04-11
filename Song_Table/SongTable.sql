#############################################
#	This Script will generate the       #
#   Song table and fill it with information #
#############################################
CREATE TABLE Song (

	ID          INT(3)          PRIMARY KEY AUTO_INCREMENT,
	Name        VARCHAR(100)    NOT NULL,
	MainArtist  VARCHAR(100)    NOT NULL,
	Genre       VARCHAR(25),
	SongLen     INT(4)          NOT NULL,
	CoverArt    VARCHAR(200)    NOT NULL

);
