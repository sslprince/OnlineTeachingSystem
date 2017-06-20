
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
    global $y;
    $x=@$_POST["text"];
    $y=$_SESSION['name1'];
    $flag=1;
    global $state;
    global $cap;
    for($i=0; $i<sizeof($x)-1; $i++)
    {

      if($x[$i]==''){
        $flag=0;
      }
      $state = $state .$x[$i]. "\n";

  }
  $size=sizeof($x)-1;
  $cap = $x[$size];

  //$query ="UPDATE file SET statement = '$state',cap = '$cap' WHERE name = '$y'";

  //$res = $db->update($query);

  ?>




  <?php
  global $y;
  global $state;
  global $cap;



  if( isset($_POST['selectfile'] ))
  {
    global $y;
    global $state;
    global $cap;

    $a = $_POST['selectfile'];
  
    //$query4 ="UPDATE file SET statement = '$state' WHERE name = '$y'";
    //$res4 = $db->update($query4);
    echo "<script>alert('You have upload successfully')</script>";
  }
  $query ="UPDATE file SET statement = '$state',cap = '$cap',class='$a' WHERE name = '$y'";

  $res = $db->update($query);
    ?>
  <br>
   <div style="text-align:left"><h2>Submit Successfully</h2></div>
  <input type="button" class="btn btn-info" onClick="window.location.href='teacher_index.php'" value="Back"/>
</table>
</div>
</body>
</html>
