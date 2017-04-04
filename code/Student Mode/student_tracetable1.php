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

<!-- Custom styles for this template -->
<link href="css/teacher.css" rel="stylesheet">
</head>

<body>

<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<section class="row text-center places">
<h1>Please fill in the trace table</h1>
</section>

<section class="row text-center placeholders">
<div class="col-6 col-sm-3 place">
<h1>Code:</h1>
<textarea name="comment" rows="20" cols="50">
<?php
$a=$_SESSION['a'];
/*
$code=$_SESSION['code'];
foreach($code as $code_value)
{
  print "$code_value<br>";
}
*/
$query = "SELECT `source_file` FROM `file` WHERE name='$a' ";
$count=0;
if(!$query_run= mysql_query($query))
{
  echo "fail";
}

while($query_row = @mysql_fetch_assoc($query_run))
{
  foreach($query_row as $value)
  {
    $str1=$value;
  }
}
$count1=0;
$start=100;
  $code=(explode("\n",$str1));
  for($i=0;$i<sizeof($code);$i++)                    //how many columns
  {
    if(!strcmp($code[$i],"#include <stdio.h>"))
    {
      $start=$i;
    }
    if($i>=$start)
    {
      $a = $code[$i] . "<br>";
      echo "$count1";
      echo $a;
      $count1++;
    }
    else
    {
      echo $code[$i];
    }
    /*
    if(strcmp($code[$i],"#include <stdio.h>"))
    {
      $start=$count;
      $count1=0;
    }
    if($count>=$start)
    {
      echo "$count1";
      echo "$code[$i]";
      $count1++;
    }
    else
    {
      echo $code[$i];
    }
    */
  }




 ?>
</textarea>
</div>
<div class="col-6 col-sm-3 place">
</div>
<div class="col-6 col-sm-3 place">
<h1>Trace&nbsp;table:</h1>
<html>
  <head>
       <title>Dynamically Add or Remove input fields in PHP with JQuery</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </head>
  <body>
       <div class="container">
            <div class="form-group">
                 <form name="add_name" id="add_name">
                      <div class="table-responsive">
                           <table class="" id="dynamic_field" border="1">
                                <tr>
                                  <?php

                                  $var = array();
                                  $query = "SELECT `variable` FROM `file` WHERE name='$a' ";
                                  if(!$query_run= mysql_query($query))
                                  {
                                    echo "fail";
                                  }
                                  while($query_row = @mysql_fetch_assoc($query_run))
                                  {
                                    foreach($query_row as $value)
                                    {
                                      $str=$value;
                                    }
                                  }
                                  $var=(explode("\n",$str));
                                  echo "<td>statement(s)</td>";                     //current statement
                                  for($i=0;$i<sizeof($var)-1;$i++)                    //how many columns
                                  {
                                    echo "<td>$var[$i]</td>";
                                  }

                                   ?>
                                </tr>
                                <tr>
                                  <?php
                                  echo '<td><input type="text" name="s[]" /></td>';                     //current statement
                                  for($i=0;$i<sizeof($var)-2;$i++)                    //how many columns
                                  {
                                    echo '<td><input type="text" name="text[]" /></td>';
                                  }
                                   ?>
                                     <td><input type="text" name="name[]" /></td>
                                </tr>
                           </table>
                           <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                           <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                      </div>
                 </form>
            </div>
       </div>
  </body>
</html>
<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
       i++;
       $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="s[]" /></td><td><input type="text" name="text[]" /></td><td><input type="text" name="text[]" /></td><td><input type="text" name="text[]" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  $(document).on('click', '.btn_remove', function(){
       var button_id = $(this).attr("id");
       $('#row'+button_id+'').remove();
  });
  $('#submit').click(function(){
       $.ajax({
            url:"name.php",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                 alert(data);
                 $('#add_name')[0].reset();
            }
       });
  });
});
</script>




    <?php


  //$_SESSION['count_line'] = $count_line;
  //$_SESSION['p'] = $p;
  //$_SESSION['text'] = $text;
  //<button id="button1" type="button" onclick="clickbutton()">Add</button>
  ?>
</div>

</section>


<section class="row text-center placeholders1">

</section>
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
