<?php
include 'database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Score</title>

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
            <li class="nav-item">
              <a class="nav-link active" href="student_result.php">Result</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student_marks.php">Marks</a>
            </li>
          </ul>
        </nav>

<?php
$result = array();
$a=$_SESSION['a'];
$u=$_SESSION['username'];
$x=$_SESSION['x'];
$y=$_SESSION['y'];
$result_s=$_SESSION['result_s'];
$result=$_SESSION['result'];
//$save_s=$_SESSION['save_s'];
//$save_d=$_SESSION['save_d'];
$flag_check=$_SESSION['flag_check'];
$c2=0;
$flag=0;
$count_w=0;
$flag_change=0;



$new_s=@$_POST["sc_s"];
$new_d=@$_POST["sc"];
for($i=0; $i<sizeof($y); $i++)
{
  if($y[$i]==$new_s[$i])
  {
    $flag_change=1;
  }
  else {
    $y[$i]=$new_s[$i];
  }
}
for($i=0; $i<sizeof($x); $i++)
{
  if($x[$i]=$new_d[$i])
  {
    $flag_change=1;
  }
  else {
    $x[$i]=$new_d[$i];
  }
}
/*
for($i=0; $i<sizeof($save_s); $i++)
{
  $y[$save_s[$i]]=$new_s[$i];
}
for($i=0; $i<sizeof($save_d); $i++)
{
  $x[$save_d[$i]]=$new_d[$i];
}
*/


 ?>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <div style='text-align:center'><h1>Result</h1></div>
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <div style="text-align:left"><h2>Code:</h2></div>
              <textarea name="comment" rows="15" cols="35">
<?php
    $a=$_SESSION['a'];
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
            <div class="col-6 col-sm-3 placeholder">
            </div>

            <div class="col-6 col-sm-3 placeholder">
              <div><h2>Trace table:</h2></div>
                 <table class="" id="dynamic_field" border="1">
                      <tr>
                        <?php
                        $var = array();
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
<?php
if($flag_check==1)
{
  for($i=0; $i<sizeof($y); $i++)
  {
    echo "<tr>";
    if($result_s[$i]==$y[$i])
    {
      echo "<td><div class='example_t' >$result_s[$i] &#10003</div></td>";
      for($c=0; $c<sizeof($var)-1; $c++)
      {
        if($result[$c2]==$x[$c2])
        {
          echo "<td><div class='example_t' >$result[$c2] &#10003</div></td>";
        }
        else {
          $flag=1;
          echo "<td><div class='example_f' title='The right answer is $result[$c2]'>$x[$c2] &#10007;</div></td>";
        }
        $c2++;
      }
      if($flag==1)
      {
        $count_w++;
      }
      $flag=0;
    }
    else {
      echo "<td><div class='example_f' title='The right answer is $result_s[$i]'>$y[$i] &#10007</div></td>";
      for($c=0;$c<sizeof($var)-1; $c++)
      {
        echo "<td><div class='example_f' title='This is not the right statement'>$x[$c2] &#10007;</div></td>";
        $c2++;
      }
      $count_w++;
    }
    echo "</tr>";
  }
}
else {
  for($i=0; $i<sizeof($y); $i++)
  {
    echo "<tr>";
    echo "<td><div class='example_t' >$result_s[$i] &#10003</div></td>";
      for($c=0; $c<sizeof($var)-1; $c++)
      {
        echo "<td><div class='example_t' >$result[$c2] &#10003</div></td>";
        $c2++;
      }
    echo "</tr>";
  }
}

?>
                 </table>
                 <br><br>
<?php
    $linenumber=sizeof($result)/(sizeof($var)-1);
    $per=100/$linenumber;
    $mark=$per*($linenumber-$count_w);
    $query = "SELECT `cap` FROM `file` WHERE name='$a' ";
    if(!$query_run= mysql_query($query))
    {
      echo "fail";
    }
    while($query_row = @mysql_fetch_assoc($query_run))
    {
      foreach($query_row as $value)
      {
        $str4=$value;
      }
    }
    if($flag_change==1)
    {
      if($mark>(1-$str4)*100)
      {
        $mark=75;
      }
    }
    $mark=number_format($mark, 2, '.', '');
    $query_insert = "INSERT INTO `Score` (`filename`, `studentname`, `score`) VALUES ('$a', '$u', '$mark')";
    @$query_insert_run = mysql_query($query_insert);

?>
                <div style='text-align:left' class='score'><h1>Your score is: <?php echo "<strong>$mark</strong>/100" ?></h1></div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </body>

  <style>
  .score{
    width:500px;
    height:80px;
  }

  input[type=text]{
      width: 100%;
      padding: 5px 20%;
      margin: 2px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  }
  .example_t {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  background-color: green;
  }
  .example_f {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  background-color: red;
  }
  .example {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  }

  </style>

</html>
