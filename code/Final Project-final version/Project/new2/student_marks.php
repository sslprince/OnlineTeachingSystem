<?php
include 'database.php';
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Welcome</title>

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
      </div>
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
              <a class="nav-link" href="student_password.php">Change password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="student_selectcode.php">Select code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="student_marks.php">Marks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log out</a>
            </li>
          </ul>
        </nav>



        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div style="text-align:center"><h1>&nbsp;</h1></div>
            <table class = "table table-striped">
<?php
echo "<tr><td>Filename</td><td>Marks</td></tr>";
$username=$_SESSION['username'];
$query = "SELECT `filename`, `score` FROM `Score` WHERE studentname='$username' ";
if(!$query_run= mysql_query($query))
{
  echo "fail";
}
while($query_row = @mysql_fetch_assoc($query_run))
{
  $filename = $query_row['filename'];
  $score = $query_row['score'];
  echo "<tr><td>$filename</td><td>$score</td></tr>";
}
?>
            </table>
        </main>
      </div>
    </div>
  </body>
</html>
