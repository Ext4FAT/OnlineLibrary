#!/bin/bash
keyword=$1
#echo -e "Searching \033[0;31;1m[${keyword}]\033[0m ... ..."
#echo -e "\033[0;33;1m[Candidates]\033[0m"
/usr/bin/find /var/www/html/pdfviewer/web/Books/ -type f -name "*${keyword}*" | while read filepath
do 
    filename=`basename $filepath`
    #echo $filename
	 echo "$filepath"
done

