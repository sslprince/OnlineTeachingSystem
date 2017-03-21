  <?php
  if(!mysql_connect('localhost', 'root', '') || !mysql_select_db('Memory tracer'))
  {
    die('no');
  }
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
         
       }
     }
   }

  ?>

  <?php

  if(!mysql_connect('localhost', 'root', '') || !mysql_select_db('Memory tracer'))
  {
    die('no');
  }
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
         die('success');
       }
     }
   }

  ?>
