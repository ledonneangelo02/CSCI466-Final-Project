#!/bin/bash
##########################################
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #
#					 #
#     THIS IS A HELPER FUNCTION FOR SQL  #
#  SCRIPT CREATION                       #
#					 #
#    By:    Angelo LeDonne z1920784      #
#           Chris Dejong   z1836870      #
#           Mark Southwood z058227       #
#           Milad Jizan    z1943173      #
##########################################



#Make sure we have .sql files in our directory
touch SongInsert.sql
touch ArtistInsert.sql

#insert a header into the ArtistInsert.sql File
echo "##########################################\n
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #\n
#					 #\n
#     THIS IS A HELPER FUNCTION FOR SQL  #\n
#  SCRIPT CREATION                       #\n
#					 #\n
#    By:    Angelo LeDonne z1920784      #\n
#           Chris Dejong   z1836870      #\n
#           Mark Southwood z058227       #\n
#           Milad Jizan    z1943173      #\n
##########################################" >> ArtistInsert.sql


#copy the header into the SongInsert.sql File
cp ArtistInsert.sql SongInsert.sql

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





