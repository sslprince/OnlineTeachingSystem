

<?php
require 'database.php';
@session_start();
    //$db = new Database();
    //$query = "SELECT * from student";
    //$posts = $db->select($query);

?>
<?php if(@$posts) :?>()
<?php while($row = $posts->fetch_assoc()):?>
echo 'lala';
<?php endwhile;?>
<?php endif; ?>
<?php
$flag_login=0;
 ?>
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
<link href="css/signin.css" rel="stylesheet">

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

<form action="register.php" class="form-signin" method="POST">
<h2 class="form-signin-heading"> </h2>
<label for="inputEmail" class="sr-only">Username</label>
<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password"  name="password" class="form-control" placeholder="Current password" required>
<label for="inputPassword" class="sr-only">New password</label>
<input type="password"  name="password1" class="form-control" placeholder="New password" required>
<input type="password"  name="password2" class="form-control" placeholder="Confirm password" required>
<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="myfunction()">Change password</button>
<br>
<div><a href="login.php">Sign in Here...</a></div>

</form>
<?php
  if(@trim($_POST['password1']) && @trim($_POST['password2']) && trim($_POST['username']) && trim($_POST['password']))
  {
    $p1=$_POST['password1'];
    $p2=$_POST['password2'];
    $un=$_POST['username'];
    $p=$_POST['password'];
    $query = "SELECT `username`, `password` FROM `clientlist`";
    if(!$query_run= mysql_query($query))
    {
      echo "fail";
    }
    while($query_row = @mysql_fetch_assoc($query_run))
    {
      $username = $query_row['username'];
      $password = $query_row['password'];
      if($username == $un && $password == $p)
      {
        $flag_login=1;
      }
    }
    if($flag_login==1)
    {
      if($p1 == $p2)
      {
        echo "<div style='text-align:center'>Success!</div>";
        $query = "UPDATE clientlist SET password='$p1' WHERE username='$un'";
        if(!$query_run= mysql_query($query))
        {
          echo "fail";
        }
      }
      else {
        echo "<div style='text-align:center'>Failed!</div>";
      }
      $flag_login=0;
    }
    else {
      echo "<div style='text-align:center'>Failed!</div>";
    }
    /*
    if($_POST['password1'] == $_POST['password2'])
    {
      $flag_login=1;
    }
    else {
      $flag_login=0;
    }
    */
  }


?>
</div> <!-- /container -->


<?php
//check if client is a student

?>




<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
