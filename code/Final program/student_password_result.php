

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


<?php
require 'database.php';
@session_start();
$p1=$_POST['password1'];
$p2=$_POST['password2'];
$un=$_SESSION['username'];
  if(@trim($p1) && @trim($p2))
  {
      if($p1 == $p2)
      {
        echo "<div style='text-align:center'><h1>Success!<h1></div>";
        echo "<br><br>";
        echo "<div class=\"container\"><button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" onClick=\"window.location.href='login.php'\">Log out</button></div>";
        $query = "UPDATE clientlist SET password='$p1' WHERE username='$un'";
        if(!$query_run= mysql_query($query))
        {
          echo "fail";
        }
      }
      else {
        echo "<div style='text-align:center'><h1>Failed!<h1></div>";
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
</body>
</html>

<style>
.container {
  width: 50%;
}
</style>
