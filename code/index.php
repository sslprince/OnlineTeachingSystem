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
  echo "<td>statement(s)</td>";
  for($i=0;$i<sizeof($var);$i++)
  {
    echo "<td>$var[$i]</td>";
  }
   ?>
</tr>

<!--the second line in the form -->
<?php
  echo "<tr>";
  echo "<td>s$count_line</td>";
  $count_line++;
    for($i=0;$i<sizeof($var);$i++)
    {
      echo '<td><input type="text" name=$text[$count_text]></td>';
      $count_text++;
    }
   echo "</tr>";
   ?>

<?php
if(isset($_POST["add"]))
{
  for($i=0; $i<$count_line; $i++)
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
}
/*
function clickadd()
{
  echo '<tr>';
  echo '<td><input type="text" name="text"></td>';
  echo '<td><input type="text" name="text"></td>';
  echo '<td><input type="text" name="text"></td>';
  echo '</tr>';

  for($i=0;$i<sizeof($var);$i++)
  {
    echo '<td><input type="text" name="text"></td>';
  }
}
*/

 ?>
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
