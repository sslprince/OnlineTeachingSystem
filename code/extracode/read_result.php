<?php
require "connect.inc.php";

session_start();
$result_origin = array();
$myfile = fopen("result.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  //echo fgets($myfile) . "<br>";      //a single line
  $result_origin[] = fgets($myfile);
  //echo $result;
}
fclose($myfile);
echo "OK";


$_SESSION['result_origin'] = $result_origin;

?>
