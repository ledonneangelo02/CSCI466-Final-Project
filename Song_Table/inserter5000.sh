#!/bin/bash

INPUT=data.csv
OLDIFS=$IFS
IFS=','
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
while read name MA gen len
do

	echo "INSERT into Song (Name,MainArtist,Genre,SongLen) VALUES(\"$name\",\"$MA\",\"$gen\",$len);" >> Insert.sql

done < $INPUT
IFS=$OLDIFS





