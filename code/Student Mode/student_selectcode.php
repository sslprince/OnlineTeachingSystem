<?php session_start(); ?>
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
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
<button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#">Student Mode</a>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Student Mode</a>
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
</nav>

<div class="container-fluid">
<div class="row">
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="student_selectcode.php">Select code</a>
</li>
</li>
<li class="nav-item">
<a class="nav-link" href="student_tracetable.php">Trace table</a>
</li>
</ul>

</nav>

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<section class="row text-center places">
<h1>Select code</h1>
</section>

<section class="row text-center placeholders">
<div class="col-6 col-sm-3 place">
<form action="student_selectcode.php" method="POST">
<select name="selectcode">
  <option value="0">Please select</option>
  <option value="value1">one variable</option>
  <option value="value2">two variables</option>

</select>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>
<div class="col-6 col-sm-3 place">
<textarea name="comment" rows="20" cols="60">
<?php
$code=$_SESSION['code'];
if(@$_POST['selectcode']=='value1')
{
  echo "code1";
  ?>
  <br>
  <?php
  foreach($code as $code_value)
  {
    print "$code_value<br>";
  }
}
if(@$_POST['selectcode']=='value2')
{
  echo "code2<br>";
  ?>
  <br>
  <?php
  foreach($code as $code_value)
  {
    print "$code_value<br>";
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
</body>
</html>
