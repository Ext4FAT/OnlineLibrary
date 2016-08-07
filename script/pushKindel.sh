#!/bin/bash

#YOU_KINDLE_EMAIL=$1
#BOOKLIST="$@"
#echo $BOOKLIST

sendemail -s smtp.gmail.com:587 -f njucs315@gmail.com -t 472381661@qq.com -u "EBOOK-ADD" -m "EBOOK-LIST" -xu njucs315@gmail.com -xp njucs315git -o tls=auto -a "../Books/Linux/Kernel/Linux内核精髓-2423.mobi" &

