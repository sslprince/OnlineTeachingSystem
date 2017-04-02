<?php
require "connect.inc.php";
session_start();

$code=array();
$myfile = fopen("code.c", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  //echo fgets($myfile) . "<br>";      //a single line
  $code[]=fgets($myfile);
  //echo $var;
}
fclose($myfile);
echo "OK";

//echo "There are $count variables!";
$_SESSION['code'] = $code;

?>
