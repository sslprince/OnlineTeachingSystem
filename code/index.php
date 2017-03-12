<?php
$var=array("x", "y", "z");
$count_line=0;         //how many line so far
$count_text=0;         //the number of current text cell
?>

<form action="index.php" method="POST">
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
      echo '<td><input type="text" name=$text[$count_text]></td>';   //one cell
      $count_text++;
    }
   echo "</tr>";
   ?>
<!--create 100 lines-->
<?php
$p=0;
while($p<100)
{
  if(isset($_POST["add"]))                         //if "add" is clicked, but have some issues
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
  $p++;
}

 ?>
 <!-- create two buttons-->
    </table><br><br>
    <input type="submit" name="add" value="Add">              
    &nbsp;&nbsp;
    <input type="submit" name="submit" value="Submit">

</form>

<?php
 ?>

<?php
//<button id="button1" type="button" onclick="clickbutton()">Add</button>

?>
