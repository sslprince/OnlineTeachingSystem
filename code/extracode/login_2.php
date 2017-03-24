<?php
require 'connect.inc.php';

 ?>



<form action="login_2.php" method="POST">
  <?php

  $query = "SELECT `username`, `password` FROM `studentlist` ORDER BY `id`";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
   if(isset($_POST['submit'])&& !empty($_POST['username'])&& !empty($_POST['password']))
   {
     //$query_run = mysql_query($query);
     while($query_row = @mysql_fetch_assoc($query_run))
     {
       $username = $query_row['username'];
       $password = $query_row['password'];
       if($username == $_POST['username'] && $password == $_POST['password'])
       {
         header('Refresh: 1; URL = student_index.php');
       }
     }
   }

  ?>

  Student:<br>
  username<input type="text" name="username" ><br>
  password<input type="password" name="password">
  <input type="submit" name="submit" value="Submit">


</form>





<form action="login_2.php" method="POST">
  <?php

  $query = "SELECT `username`, `password` FROM `teacherlist` ORDER BY `id`";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
   if(isset($_POST['submit'])&& !empty($_POST['username'])&& !empty($_POST['password']))
   {
     //$query_run = mysql_query($query);
     while($query_row = @mysql_fetch_assoc($query_run))
     {
       $username = $query_row['username'];
       $password = $query_row['password'];
       if($username == $_POST['username'] && $password == $_POST['password'])
       {
         header('Refresh: 1; URL = teacher_index.php');
       }
     }
   }

  ?>

  Teacher:<br>
  username<input type="text" name="username" ><br>
  password<input type="password" name="password">
  <input type="submit" name="submit" value="Submit">


</form>
