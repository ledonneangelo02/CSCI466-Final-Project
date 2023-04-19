#!/bin/bash


#Defining our data file where all the info is stored
INPUT=songs.csv
OLDIFS=$IFS
IFS=','
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
while read name fill1 fill2 fill3 fill4
do
	
	fileName="${name}.txt"
	touch "${fileName}"
done < $INPUT
IFS=$OLDIFS




