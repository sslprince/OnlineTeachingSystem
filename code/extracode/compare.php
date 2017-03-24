<?php
session_start();

$text=$_SESSION['text'];
$result_origin=$_SESSION['result_origin'];


$result=array_diff($text,$result_origin);
for($i=0; $i<sizeof($result_origin); $i++)
{
  echo $result_origin[$i];
}

function compare()
{
  $result=array_diff($text,$result_origin);
  echo $result;
}




 ?>
