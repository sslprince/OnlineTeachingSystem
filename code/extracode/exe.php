<?php

$arr_time=$_POST['data']['time'];
$arr_grade=$_POST['data']['grade'];
$arr_type=$_POST['data']['type'];

for($i=0;$i<count($arr_time);$i++){
    $insert[$i]['time']=$arr_time[$i];
    $insert[$i]['grade']=$arr_grade[$i];
    $insert[$i]['type']=$arr_type[$i];
}

echo "<pre>";
print_r($insert);
echo "</pre>";
/*每个数据是一条数据
Array
(
    [0] => Array
        (
            [time] => 2014年11月7日 15:50:18
            [grade] => 1
            [type] => 三好生
        )

    [1] => Array
        (
            [time] => 2014年11月7日 15:50:24
            [grade] => 2
            [type] => 优秀生
        )

    [2] => Array
        (
            [time] => 2014年11月7日 15:50:27
            [grade] => 1
            [type] => 三好生
        )

)
*/
?>  
