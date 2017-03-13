
<form action="index.php" method="GET">

<?php
error_reporting(0);
$var=array("x", "y", "z");
$count_line=0;         //how many line so far
$count_text=0;         //the number of current text cell
$text=array();
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

 $p=0;
   if(isset($_GET["add"]))                         //if "add" is clicked, but have some issues
   {
     while($p<6)
     {
       echo "<tr>";
       echo "<td>s$count_line</td>";
       $count_line++;
         for($i=0;$i<sizeof($var);$i++)
         {
           echo '<td><input type="text" name="text[]"></td>';
         }
     echo "</tr>";
     $p++;
     }
   }

 /*
 if(isset($_POST['add']))
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
 */

  ?>
    </table><br><br>
    <input type="submit" name="add" value="Add">
    &nbsp;&nbsp;
    <input type="submit" name="submit" value="Submit">

  </form>



<?php
foreach($_GET['text'] as $text)
{
  echo $text;
  ?>
  <br>
  <?php
}

//<button id="button1" type="button" onclick="clickbutton()">Add</button>

?>
