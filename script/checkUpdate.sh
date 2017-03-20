#!/bin/bash
topk=6

find "./Books/" -type f -name "*.pdf" | while read filepath
do
    #file=`basename $filepath`
    time=`stat "$filepath" 2>/dev/null| grep "Change:"|awk '{print $2"-"$3}'`
    echo $time " $filepath" 1>>out.txt
done

cat out.txt| sort -nr| head -$topk | awk '{for(i=2;i<NF;++i) printf $i" "; printf $NF"\n"}'
echo /dev/null > out.txt
