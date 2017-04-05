<?php
include 'header_student.php';
include 'database.php';
//include 'result.php';
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Memory Trace Student Mode</title>

<!-- Bootstrap core CSS -->

<!-- Custom styles for this template -->
<link href="css/teacher.css" rel="stylesheet">
</head>

<body>

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<section class="row text-center places">
<h1>Please fill in the trace table</h1>
</section>

<section class="row text-center placeholders">
<div class="col-6 col-sm-3 place">
<h1>Code:</h1>
<textarea name="comment" rows="20" cols="50">
<?php
$a=$_SESSION['a'];
/*
$code=$_SESSION['code'];
foreach($code as $code_value)
{
  print "$code_value<br>";
}
*/
$query = "SELECT `source_file` FROM `file` WHERE name='$a' ";
$start=100;
$count1=0;
if(!$query_run= mysql_query($query))
{
  echo "fail";
}
while($query_row = @mysql_fetch_assoc($query_run))
{
  foreach($query_row as $value)
  {
    $str1=$value;
  }
}
$code=(explode("\n",$str1));
for($i=0;$i<sizeof($code);$i++)                    //how many columns
{
  if(!strcmp($code[$i],"int main(int argc, const char * argv[]) {"))
  {
    $start=$i;
  }
  if($i>=$start)
  {
    echo "$count1";
    echo "    ";
    echo "$code[$i]\n";

    $count1++;
  }
  else
  {
    echo "    ";
    echo "$code[$i]\n";
  }
}


 ?>
</textarea>
</div>
<div class="col-6 col-sm-3 place">
</div>
<div class="col-6 col-sm-3 place">
<h1>Trace&nbsp;table:</h1>
<form name="add_name" id="add_name" action="student_tracetable1.php" method="POST">
<table class="" id="dynamic_field" border="1">
<tr>
  <?php
  $s=array();
  $var = array();
  $text=array();
  $query = "SELECT `variable` FROM `file` WHERE name='$a' ";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    foreach($query_row as $value)
    {
      $str=$value;
    }
  }
  $var=(explode("\n",$str));
  echo "<td>statement(s)</td>";                     //current statement
  for($i=0;$i<sizeof($var)-1;$i++)                    //how many columns
  {
    echo "<td>$var[$i]</td>";
  }
   ?>
</tr>
<tr>
  <td><input type="text" name="s[]" value="1"/></td>
  <?php
  for($i=0;$i<sizeof($var)-1;$i++)                    //how many columns
  {

    echo "<td><input type=\"text\" name=\"text[]\" value=\"2\" /></td>";
  }
    ?>
</tr>
</table>
<textarea>
  <?php
  echo $_POST["s"][0];
  ?>
</textarea>

<button type="button" name="add" id="add" class="btn btn-success">Add More</button>
<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />



</form>











</div>

</section>


<section class="row text-center placeholders1">

</section>
</body>
</html>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
