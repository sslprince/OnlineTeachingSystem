<?php
require "connect.inc.php";
session_start();
$count=0;
$var=array();
$myfile = fopen("variables.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  //echo fgets($myfile) . "<br>";      //a single line
  $var[]=fgets($myfile);
  //echo $var;
}
fclose($myfile);

//echo "There are $count variables!";
$_SESSION['var'] = $var;

?>
