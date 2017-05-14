
<?php include 'database.php';?>
<?php include 'header.php';?>
<?php include 'config/Config.php';?>
<?php session_start();?>
<?php
  $db = new database();
?>

<!DOCTYPE html>
<html>
<head>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/dashboard.css" rel="stylesheet">



<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->


<!-- Custom styles for this template -->
<link rel="stylesheet" href="../../css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

   <table class="" id="dynamic_field" border="1">
  <?php
    $x=@$_POST["text"];
    $y=$_SESSION['name1'];

    $state="";
    for($i=0; $i<sizeof($x); $i++)
    {
      $state = $state .$x[$i]. "\n";

  }


  $query ="UPDATE file SET statement = '$state' WHERE name = '$y'";

  $res = $db->update($query);

  ?>
  <div style="text-align:left"><h2>Submit Successfully</h2></div>
  <input type="button" onClick="window.location.href='teacher_index.php'" value="Back"/>
</table>
</div>
</body>
</html>
