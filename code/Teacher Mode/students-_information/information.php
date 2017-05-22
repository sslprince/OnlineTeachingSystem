<?php include '../../database2.php';?>
<?php include '../../config/Config.php';?>
<?php include 'header.php';?>
<?php
  $db = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">





<?php
    $query = "SELECT * FROM file";
    /*$shouts = mysqli_query($con,$query);*/
    $shouts = $db->select($query);

    ?>

<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="../../css/choose0.css" type="text/css" />
<link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/dashboard.css" rel="stylesheet">
</head>
<body>
</body>
</html>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">








<div class ="parent">
  <h2>Upload Students' Information</h2>

<form action="information1.php" method="post"
enctype="multipart/form-data">
<div id = "input">
<label for="file">Filename :</label>
<input type="file" name="file" id="file" />

<input class="btn btn-info"<input type="submit" name="submit" value="Submit" />
</form>
</div>
</div>
<?php
        $query2 = "SELECT distinct class FROM studentlist";
        $res = $db->select($query2);
    ?>
<div class ="child">

  <h2>View Students' Information</h2>
  <form name="form1" enctype="multipart/form-data" method="post" action="">

    <label for="file">Select class :</label>

  <select name="select">

              <?php while($row = mysqli_fetch_assoc($res)): ?>

                <li><option value="<?php echo $row['class']?>"><?php echo $row['class']?></option></li>


              <?php endwhile;?>


</select>

<div id = "input">
  <input type="submit" name="submit" class="btn btn-info"value="Results" />


</div>
</form>


<?php
if( $_POST )
{

  $a = $_POST['select'];
  echo"$a";
  $query1 = "SELECT username FROM studentlist  WHERE class = '$a' ";
  $res1 = $db->select($query1);
  if($res1==false){
    echo"lala";
  }

?>
<table class = "table table-striped">
<caption><h2><?php echo $a?></h2></caption>
<tr>

     <td>username</td>


<?php while($row = mysqli_fetch_assoc($res1)){
  echo"<tr>";
     echo"<td>".$row['username']."</td>";

  echo"</tr>";
}
?>
</tr>
</table>
<?php } ?>
</div>
</div>
</div>


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
