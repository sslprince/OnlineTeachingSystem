

<?php
require 'database.php';
    //$db = new Database();
    //$query = "SELECT * from student";
    //$posts = $db->select($query);

?>
<?php if(@$posts) :?>()
<?php while($row = $posts->fetch_assoc()):?>
echo 'lala';
<?php endwhile;?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>Signin Template for Bootstrap</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div class="container">

<form action="login.php" class="form-signin" method="POST">
<h2 class="form-signin-heading">Please login in:</h2>
<label for="inputEmail" class="sr-only">Username</label>
<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password"  name="password" class="form-control" placeholder="Password" required>
<div class="checkbox">
<label>
<input type="checkbox" value="remember-me"> Remember me
</label>
</div>
<?php
$query = "SELECT `username`, `password`, `symbol` FROM `clientlist` ORDER BY `id`";
if(!$query_run= mysql_query($query))
{
  echo "fail";
}
 if(!empty($_POST['username'])&& !empty($_POST['password']))
 {
   echo "ok";
   //$query_run = mysql_query($query);
   while($query_row = @mysql_fetch_assoc($query_run))
   {
     $username = $query_row['username'];
     $password = $query_row['password'];
     $symbol = $query_row['symbol'];
     if($username == $_POST['username'] && $password == $_POST['password'] && $symbol == 's')
     {
       header('Refresh: 0; URL = student_index.php');
     }
     if($username == $_POST['username'] && $password == $_POST['password'] && $symbol == 't')
     {
       header('Refresh: 0; URL = teacher_index.php');
     }
   }
 }
 ?>
<button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
</form>

</div> <!-- /container -->


<?php
//check if client is a student

?>




<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
