<?php include 'database.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Memory Trace Teacher Mode</title>

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
<a class="navbar-brand" href="#">Teacher Mode</a>

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
<a class="nav-link" href="a.php">Upload C Code</a>

</li>
<li class="nav-item">
<a class="nav-link" href="#">Students' Marks</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Error Analytics</a>
</li>
</ul>

</nav>

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<section class="row text-center places">
<h1>Upload C Code</h1>
<div class="col-6 col-sm-3 place">
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</section>


<?php
    $query = "SELECT * FROM file";
    $shouts = mysqli_query($con,$query);
   
?>

<html>
<head>
<meta charset="utf-8" />
<title>SHOUT IT!</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<div id="shouts">
<ul>
<?php while($row = mysqli_fetch_assoc($shouts)) : ?>
<li class = "shout"><span><strong><?php echo $row['name']?></li>
<?php endwhile;?>
</ul>
</div>

<br />
<input class="shout-btn"type="submit" name ="submit" value = "shoot it out"/>
</form>

</div>
</body>
</html>


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
