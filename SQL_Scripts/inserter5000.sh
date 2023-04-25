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
rm SongInsert.sql
rm ArtistInsert.sql
rm KFInsert.sql
touch KFInsert.sql
touch SongInsert.sql
touch ArtistInsert.sql

#insert a header into the ArtistInsert.sql File
echo "########################################## 
# CSCI 466  FINAL GROUP PROJECT  SEC: 02 #
#                                        #
#     THIS IS A HELPER FUNCTION FOR SQL  #
#  SCRIPT CREATION                       #
#                                        #
#    By:    Angelo LeDonne z1920784      # 
#           Chris Dejong   z1836870      #
#           Mark Southwood z058227       #
#           Milad Jizan    z1943173      #
##########################################
" >> ArtistInsert.sql


#copy the header into the SongInsert.sql File
cp ArtistInsert.sql SongInsert.sql
cp ArtistInsert.sql KFInsert.sql


#Defining our data file where all the info is stored
INPUT=songs.csv
OLDIFS=$IFS
IFS=','
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
while read name MA gen len CA
do

	echo "INSERT INTO Song (Name,Genre,SongLen,CoverArt) VALUES(\"$name\",\"$gen\",$len,\"$CA\");" >> SongInsert.sql
	echo "INSERT INTO Artist (Name) VALUES(\"$MA\");" >> ArtistInsert.sql
	

done < $INPUT
IFS=$OLDIFS


filepath=$(pwd)
fp=$filepath/KFLyricFiles

for FILE in "$fp"/*.txt; do

	echo "INSERT INTO KaraokeFile (File) VALUES (\"$FILE\");" >> KFInsert.sql
done




