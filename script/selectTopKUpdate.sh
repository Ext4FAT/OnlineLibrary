#!/bin/bash
topk=3

find "/var/www/html/OnlineViewer/Books/" -type f -name "*.pdf" | while read filepath
do
    #file=`basename $filepath`
    time=`stat "$filepath" 2>/dev/null| grep "Change:"|awk '{print $2"-"$3}'`
    echo $time " $filepath" 1>>out.txt
done

cat out.txt| sort -nr| head -$top | awk '{print $2}'
echo /dev/null > out.txt
