<?php
$var=array("x", "y", "z");
$counter=0;
?>

<form action="index.php" method="POST">
<table id="table1" border="1">
　<tr>
  <?php
  for($i=0;$i<sizeof($var);$i++)
  {
    echo "<td>$var[$i]</td>";
  }
   ?>
</tr>
<tr>
  <?php
    for($i=0;$i<sizeof($var);$i++)
    {
      echo '<td><input type="text" name=$text[$i]></td>';
    }
   ?>
  　</tr>
<?php

if(isset($_POST["add"]))
{
  clickadd();
}
function clickadd()
{
  echo '<tr>';
  echo '<td><input type="text" name="text"></td>';
  echo '<td><input type="text" name="text"></td>';
  echo '<td><input type="text" name="text"></td>';
  echo '</tr>';

/*
  for($i=0;$i<sizeof($var);$i++)
  {
    echo '<td><input type="text" name="text"></td>';
  }
*/
}

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
