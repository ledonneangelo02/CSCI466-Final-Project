#!/bin/bash

INPUT=songs.csv
OLDIFS=$IFS
IFS=','
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
while read name MA gen len CA
do

	echo "INSERT into Song (Name,MainArtist,Genre,SongLen,CoverArt) VALUES(\"$name\",\"$MA\",\"$gen\",$len,\"$CA\");" >> Insert.sql

done < $INPUT
IFS=$OLDIFS





