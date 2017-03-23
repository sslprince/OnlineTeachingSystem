<?php
require 'connect.inc.php';

$query_insert = "INSERT INTO test1 (result) VALUES (2)";
if(@$query_insert_run = mysql_query($query_insert))
{
  echo "OK";
}




?>
