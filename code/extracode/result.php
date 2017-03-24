<?php
session_start();

$var=$_SESSION['var'];
$count_line=$_SESSION['count_line'];
$p=$_SESSION['p'];
$text=$_SESSION['text'];
$comment=array();

for($i=0; $i<sizeof($text); $i++)
{
  echo $text[$i];
}

?>



<table id="table1" border="1">

<!--the first line in the form -->
<tr>
  <?php
echo "<td>statement(s)</td>";
for($i=0;$i<sizeof($var);$i++)                    //how many columns
{
  echo "<td>$var[$i]</td>";
}
?>
</tr>


<?php

for($i=0;$i<$p+1;$i++)
{
  echo "<tr>";
  echo "<td>s$i</td>";                       //current statement
    for($y=0;$y<sizeof($var);$y++)
    {
      ?>

      <td><textarea name="comment" rows="5" cols="10"><?php echo $text[$i];?></textarea></td>

      <?php
    }
   echo "</tr>";
}
   ?>

</table>

<?php

 ?>
