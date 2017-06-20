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

    <title>Result</title>

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
$save_d=array();
$save_s=array();
$c2=0;
$flag=0;
$count_w=0;
$flag_w=0;



 ?>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <div style='text-align:center'><h1>Result</h1></div>
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <div style="text-align:left"><h2>Code:</h2></div>
              <textarea name="comment" rows="15" cols="35">
<?php $a=$_SESSION['a'];
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
              <form name="secondchance" method="POST" action="student_result_score.php">
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
for($i=0; $i<sizeof($y); $i++)
{
  echo "<tr>";
  if($result_s[$i]==$y[$i])
  {
    echo "<td><div class='example_t' ><input type='text' name='sc_s[]' value=$result_s[$i]></div></td>";
    for($c=0; $c<sizeof($var)-1; $c++)
    {
      if($result[$c2]==$x[$c2])
      {
        echo "<td><div class='example_t' ><input type='text' name='sc[]' value=$result[$c2]></div></td>";
      }
      else {
        $flag=1;
        if($flag_w==0)
        {
          echo "<td><div class='example_f_r'><input type='text1' name='sc[]' title='The is your first wrong field. Please check the other fields.' value=$x[$c2]></div></td>";
          $flag_w=1;
        }
        else {
          echo "<td><div class='example_f'><input type='text' name='sc[]' value=$x[$c2]></div></td>";
        }
        //$save_d[]=$c2;
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
    //$save_s[]=$i;
    if($flag_w==0)
    {
      echo "<td><div class='example_f_r' ><input type='text1' name='sc_s[]' title='The is your first wrong field. Please check the other fields.' value=$y[$i]></div></td>";
      $flag_w=1;
    }
    else {
      echo "<td><div class='example_f' ><input type='text' name='sc_s[]' value=$y[$i]></div></td>";
    }
    for($c=0;$c<sizeof($var)-1; $c++)
    {
      if($flag_w==0)
      {
        echo "<td><div class='example_f_r' ><input type='text1' name='sc[]' title='The is your first wrong field. Please check the other fields.' value=$x[$c2]></div></td>";
        $flag_w=1;
      }
      else {
        echo "<td><div class='example_f' ><input type='text' name='sc[]' value=$x[$c2]></div></td>";
      }
      //$save_d[]=$c2;
      $c2++;
    }
    $count_w++;
  }
  echo "</tr>";
}

?>
                 </table>
                 <br><br>
                 <div style='text-align:left' class='notice'>*Notice:<br>- Your first wrong part has already pointed with red background. <br>- You can change all your answers at this page.</div>
                <div style="text-align:right"><input type="submit" name="submit" id="submit" class="btn btn-info" value="Check score" /></div>
<?php
//$_SESSION['save_s']=$save_s;
//$_SESSION['save_d']=$save_d;
 ?>
            </form>
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
      padding: 2px 20%;
      margin: 2px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  }
  input[type=text1]{
      width: 100%;
      padding: 2px 20%;
      margin: 2px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: red;
  }
  .example_t {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  }
  .example_f {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  height: 100%;
  }
  .example_f_r {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  height: 100%;
  background-color: red;
  }
  .example {
  width: 100%;
  max-width: 120px;
  min-width: 80px;
  }
  .notice{
    width:500px;
    height:80px;
  }

  </style>

</html>
