<?php session_start();?>
<?php include 'database.php';?>
<?php include 'config/Config.php';?>
<?php
  $db = new database();
?>
<?php

    $name =$_SESSION['name'];
    $a = "";
    $b = "";
    $b1 = "";
    $a1 ="";
    $file = "../../c.txt";
    $file1 = "../../d.txt";
    if(file_exists($file))
    {
        $myfile = fopen("../../c.txt", "r") or die("Unable to open file!");
        $myfile1 = fopen("../../c.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a = $a .fgets($myfile);
        }
        while(!feof($myfile1)) {
            $a1 = $a1 .fgets($myfile1) . "<br>";
        }
        //echo $a1;
        $query ="UPDATE file SET solution = '$a' WHERE name = '$name'";

        $res = $db->update($query);

    }
    else
    {
        echo "Please create solution according to the instruction and try again";
    }

    if(file_exists($file1))
    {
        $myfile1 = fopen("../../d.txt", "r") or die("Unable to open file!");
        $myfile2 = fopen("../../d.txt", "r") or die("Unable to open file!");
        while(!feof($myfile1)) {
            $b = $b .fgets($myfile1);
        }
        while(!feof($myfile2)) {
            $b1 = $b1 .fgets($myfile2) . "<br>";
        }
      //  echo $b;
        $query ="UPDATE file SET variable = '$b' WHERE name = '$name'";

        $res = $db->update($query);

    }
    else
    {
        echo "Please create solution according to the instruction and try again";
    }
    ?>
    <form name="add_name" id="add_name" method="POST" action="upload_statement.php">
    <table class="" id="dynamic_field" border="1">
         <tr>
    <?php
    $query1 = "SELECT `variable` FROM `file` WHERE name='$name' ";
    $res = $db->select($query1);
    $query2 = "SELECT `solution` FROM `file` WHERE name='$name' ";
    $res1 = $db->select($query2);
    $var = array();
    $var1 = array();
    while($row = mysqli_fetch_assoc($res))
    {
      foreach($row as $value)
      {
        $str=$value;
      }
    }
    $var=(explode("\n",$str));
    echo "<td>statement(s)</td>";
    $size =   sizeof($var);                  //current statement
    for($i=0;$i<sizeof($var)-1;$i++)                    //how many columns
    {
      echo "<td>$var[$i]</td>";
    }
    echo"</tr>";
    $index=0;
    while($row1 = mysqli_fetch_assoc($res1))
    {
      foreach($row1 as $value1)
      {
        $str1=$value1;
      }
    }
    $var1=(explode("\n",$str1));
    for($i=0;$i<sizeof($var1)-1;$i=$i+$size-1)
                      //how many columns
    { echo"<tr>";
      echo '<td><input class="example" type="text" name="text[]" /></td>';
      for($j=0;$j<$size-1;$j++){
        $z=$j+$i;
        echo "<td>$var1[$z]</td>";
      }
      echo"</tr>";
    }
$_SESSION['name1'] = $name;
echo$name;
?>
</tr>
</table>
<input type="submit"  name="submit" id="submit" class="btn btn-info" value="Submit" />

</form>
<script>

$(document).ready(function(){
  $('#submit').click(function(){
    //alert("ok");
    $.ajax({
         url:"upload_statement.php",
         method:"POST",
         data:$('#add_name').serialize(),
         success:function(data)
         {
           /*
              alert("data");
              $('#add_name')[0].reset();
              */
         }
    });
  });
});
</script>
