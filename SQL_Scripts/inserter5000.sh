#!/bin/bash


#Make sure we have .sql files in our directory
touch SongInsert.sql
touch ArtistInsert.sql

#insert a header into the ArtistInsert.sql File
echo "##############################"  >> ArtistInsert.sql
echo "# This is a SQL Script that  #"  >> ArtistInsert.sql
echo "# will insert data into our  #"  >> ArtistInsert.sql
echo "# table.                     #"  >> ArtistInsert.sql
echo "##############################"  >> ArtistInsert.sql

#copy the header into the SongInsert.sql File
cp ArtistInsert.sql SongInsert.sql


CTR=0

#Defining our data file where all the info is stored
INPUT=songs.csv
OLDIFS=$IFS
IFS=','
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
while read name MA gen len CA
do

	echo "INSERT INTO Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES(\"$name\",\"$MA\",\"$gen\",$len,\"$CA\");" >> SongInsert.sql


	echo "INSERT INTO Artist (FirstName) VALUES(\"$MA\");" >> ArtistInsert.sql

done < $INPUT
IFS=$OLDIFS





