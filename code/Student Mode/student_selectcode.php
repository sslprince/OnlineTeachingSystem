<?php
include 'header_student.php';
include 'database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Memory Trace Student Mode</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/teacher.css" rel="stylesheet">
</head>

<body>
<form action="student_selectcode.php" method="POST">


<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<section class="row text-center places">
<h1>Select code</h1>
</section>

<section class="row text-center placeholders">
<div class="col-6 col-sm-3 place">

<select name="select">
  <?php
  $query = "SELECT `name` FROM `file` ";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  echo "<option value='0'>Please select</option>";
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    foreach($query_row as $value)
    ?>
    <option value="<?php echo $value?>"><?php echo $value ?></option>";
    <?php
    $i++;
  }
   ?>

</select>
<br><br><br><br><br><br><br>
<input type="submit" name="submit" value="Submit">

</div>

<div class="col-6 col-sm-3 place">
<textarea name="comment" rows="20" cols="60">
<?php
  if(@$_POST)
  {
    $a=$_POST['select'];
    $_SESSION['a'] = $a;
    $query = "SELECT `source_file` FROM `file` WHERE name='$a' ";
    if(!$query_run= mysql_query($query))
    {
      echo "fail";
    }
    while($query_row = @mysql_fetch_assoc($query_run))
    {
      foreach($query_row as $value)
      {
        echo $value;
      }
    }

  }
?>
</textarea>

</div>
</section>

<section class="row text-center placeholders1">

</section>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</form>
</body>

</html>
