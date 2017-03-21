



<form action="index.php" method="POST">

  <?php
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
    echo '<td><input type="text" name="text0"></td>';
    /*
      for($i=0;$i<sizeof($var);$i++)
      {
        echo '<td><input type="text" name="text_0"></td>';   //one cell
        $count_text++;
      }
      */
     echo "</tr>";
     if(isset($_POST["text0"]))
     {
       $text[0]=$_POST['text0'];
       echo $text[0]; 
     }
     ?>
   </table>

</form>


<input type="submit" name="add" value="Add">
&nbsp;&nbsp;
<input type="submit" name="submit" value="Submit">
