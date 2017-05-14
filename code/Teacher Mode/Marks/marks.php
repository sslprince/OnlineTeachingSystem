<?php include 'database.php';?>
<?php include 'config/Config.php';?>
<?php include 'header.php';?>
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
<?php
$xdata=array();
$ydata=array();
?>
<?php
        $query = "SELECT distinct filename FROM Score";
        $res = $db->select($query);
        $res1=null;
    ?>


<!-- Custom styles for this template -->

<link rel="stylesheet" href="../../css/mark.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">



<ul>
<?php

        $query = "SELECT Score.*,  clientlist.class FROM Score inner join clientlist on Score.studentname=clientlist.username";
        $res = $db->select($query);

    ?>




<!--<table width=300 border=1 align="center">-->
<table class = "table table-striped">
<caption><h2>MARK TABLE</h2></caption>
      <tr>
           <td>studentname</td>
           <td>filename</td>
           <td>class</td>
           <td>score</td>
      </tr>
      <?php while($row = mysqli_fetch_assoc($res)){
        echo"<tr>";
           echo"<td>".$row['studentname']."</td>";
           echo"<td>".$row['filename']."</td>";
           echo"<td>".$row['class']."</td>";
           echo"<td>".$row['score']."</td>";

        echo"</tr>";
      }?>

</table>


</ul>

<input type="button" class="btn btn-info" onclick="window.location.href='marks1.php'" value="Source File"/>
<input type="button" class="btn btn-info" onclick="window.location.href='marks2.php'" value="Classes"/>
</div>

<header>
<h1>Solution </h1>
</header>


<ul>
<p id="demo"></p>
<script>
function clicke(){
    alert("Please generate solution by terminal,then click upload");
}


</script>
<script>

function foo () {
    $.ajax({
           url:"upload_solution.php", //the page containing php script
           type: "POST", //request type
           success:function(result){
           document.getElementById("demo").innerHTML = result;
           }
           });
}
</script>


</ul>



</body>
</html>
