<?php
session_start();
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Check</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Student mode</a>
<!--
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      -->
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="student_index.php">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student_selectcode.php">Select code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student_tracetable.php">Trace table</a>
            </li>
          </ul>
        </nav>

<?php
  $x=@$_POST["text"];
  $y=@$_POST["s"];
  $count_v=0;
  $count_s=0;
  $flag_check=0;
  $str2=array();
  $result=array();
  $result_s=$_SESSION['result_s'];
  $a=$_SESSION['a'];
  for($i=0; $i<sizeof($x); $i++)
  {
    if(strlen(trim($x[$i])))
    {
      $count_v++;
    }
  }
  for($i=0; $i<sizeof($y); $i++)
  {
    if(strlen(trim($y[$i])))
    {
      $count_s++;
    }
  }
  $query = "SELECT `solution` FROM `file` WHERE name='$a' ";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    foreach($query_row as $value)
    {
      $str2=$value;
    }
  }
  $result=(explode("\n",$str2));
  array_pop($result);
  $_SESSION['result']=$result;


?>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <br><br>
<?php
if($count_s!=0 && $count_v!=0 && sizeof($x)==$count_v && sizeof($y)==$count_s && sizeof($x)==sizeof($result))
{
  echo "<div style='text-align:center'><h1>You have already finished trace table.<br> Do you want to check your score or do some changes?</h1></div>";
  for($i=0; $i<sizeof($result_s); $i++)
  {
    if($result_s[$i]!=$y[$i])
    {
      $flag_check=1;
    }
  }
  for($i=0; $i<sizeof($result); $i++)
  {
    if($result[$i]!=$x[$i])
    {
      $flag_check=1;
    }
  }
  if($flag_check==1)
  {
    echo "<div style='text-align:center'><input type=\"submit\" onClick=\"history.go(-1);\" class=\"btn btn-info\" value=\"Back\" />&nbsp;&nbsp;&nbsp;<input type=\"submit\" onClick=\"window.location.href='student_result.php'\" class=\"btn btn-info\" value=\"Next\" /></div>";
  }
  else {
    header('Refresh: 0; URL = student_result_score.php');
  }
}
else {
  echo "<div style='text-align:center'><h1>There are some blanks!<br> Or You missed some lines that have variables!<br>Please back to trace table</h1></div>";
  echo "<div style='text-align:center'><input type=\"submit\" onClick=\"history.go(-1);\" class=\"btn btn-info\" value=\"Back\" /></div>";
}
?>

        </main>
      </div>
    </div>
  </body>

<?php
$array_x=array();
$array_y=array();
$_SESSION['x'] = $x;
$_SESSION['y'] = $y;
$_SESSION['flag_check'] = $flag_check;


 ?>

</html>
