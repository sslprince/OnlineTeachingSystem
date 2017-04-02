
<?php
session_start();
//error_reporting(0);
$var=$_SESSION['var'];
$count_line=0;         //how many line so far
$count_text=0;         //the number of current text cell

?>

<table id="table1" border="1">

<!--the first line in the form -->
<tr>
  <?php
  echo "<td>statement(s)</td>";                     //current statement
  for($i=0;$i<sizeof($var);$i++)                    //how many columns
  {
    echo "<td>$var[$i]</td>";
  }
  $_SESSION['var'] = $var;
   ?>
</tr>

<!--the second line in the form -->
<?php
  echo "<tr>";
  echo "<td>s$count_line</td>";                       //current statement
  $count_line++;
    for($i=0;$i<sizeof($var);$i++)
    {
      echo '<td><input type="text" name="text[]"</td>';   //one cell
    }
   echo "</tr>";
   ?>
<!--create 100 lines-->
<?php

 ?>
 <?php

   if(isset($_POST['text']) && !empty($_POST['text']))                         //if "add" is clicked, but have some issues
   {
     //echo "OK";
     $text=$_POST['text'];
     foreach($text as $value)
     {
       print "$value<br>";
     }
   }

 if(isset($_GET['add']))
 {
   echo "<tr>";
   echo "<td>s$count_line</td>";
   $count_line++;
   for($i=0;$i<sizeof($var);$i++)
   {
     echo '<td><input type="text" name=$text[$count_text]></td>';
     $count_text++;
   }
   echo "</tr>";

 }

  ?>
    </table><br><br>
    <form action="trace_table_test.php" method="POST">
    <input type="submit" name="submit" value="Submit">
    &nbsp;&nbsp;
    </form>
    <form action="trace_table_test.php" method="GET">
    <input type="submit" name="add" value="Add">
    &nbsp;&nbsp;
    </form>



  <?php


$_SESSION['count_line'] = $count_line;
//$_SESSION['p'] = $p;
//$_SESSION['text'] = $text;
//<button id="button1" type="button" onclick="clickbutton()">Add</button>

?>
