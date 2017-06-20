#!/bin/bash


gcc -g main.c -o tet
gdb tet < result.sh

name[0]=2
index=false
touch c.txt
touch d.txt
w=0
while read myline
do
arr=(${myline// / })
j=0
for i in ${arr[@]}
do
j=$[j+1]
#echo $j
if echo $i | egrep -q '^(\-|\+)?\d+(\.\d+)?$';
then
for z in ${name[@]}
do
echo $z
if [ "$z" == "${arr[$[j-3]]}" ];
then
index=ture
fi
done
fi
done
if [ "$index" == "false" ];
then
w=$[w+1]
name[$w]=${arr[$[j-3]]}
echo ${arr[$[j-3]]}>>d.txt
else
break
fi
done < b.txt



while read myline
do
arr=(${myline// / })
j=0
for i in ${arr[@]}
do
j=$[j+1]
#echo $j
if echo $i | egrep -q '^(\-|\+)?\d+(\.\d+)?$';
then echo $i>>c.txt

fi
done
done < b.txt