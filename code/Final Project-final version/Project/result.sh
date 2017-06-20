set $i = 0
break 1
run
set logging file b.txt
set logging on
info locals
set logging off
while($i<100)
set logging off
step
set logging on
info locals
set logging off
set $i = $i +1
end
