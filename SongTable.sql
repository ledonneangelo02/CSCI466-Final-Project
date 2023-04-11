#############################################
#	This Script will generate the       #
#   Song table and fill it with information #
#############################################
CREATE TABLE Song (

	ID          INT(3)         PRIMARY KEY AUTO_INCREMENT,
	Name        VARCHAR(30)    NOT NULL,
	MainArtist  VARCHAR(30)    NOT NULL,
	SongLen     INT(4)         NOT NULL
);
