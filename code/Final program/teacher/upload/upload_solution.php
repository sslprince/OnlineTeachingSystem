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
    if(file_exists($file))
    {

      $query3 = "SELECT `variable` FROM `file` WHERE name='$name' ";
      $res3 = $db->select($query3);
      while($row3 = mysqli_fetch_assoc($res3))
      {
        foreach($row3 as $value)
        {
          $str=$value;
        }
      }
        $var = array();
      $var=(explode("\n",$str));
      global $var;
      $size =   sizeof($var);
      global $size;
        $myfile = fopen("../../c.txt", "r") or die("Unable to open file!");
        $myfile1 = fopen("../../c.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {

            $a = $a .fgets($myfile).",";

        }
        while(!feof($myfile1)) {
            $a1 = $a1 .fgets($myfile1) . "<br>";

        }
        $a2 = array();
        $a2=(explode(",",$a));
        $rest1="";
        $number=0;
        for($i=$size-1;$i<sizeof($a2)-2;$i++){
          $number=round(doubleval($a2[$i]), 2);
          $rest1=$rest1.strval($number)."\n";
        }

        //echo "$rest1";
        //echo $a1;
        $query ="UPDATE file SET solution = '$rest1' WHERE name = '$name'";

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
    global $size;
    $query2 = "SELECT `solution` FROM `file` WHERE name='$name' ";
    $res1 = $db->select($query2);
    global $var;

    $size =   sizeof($var);

    $var1 = array();

    echo "<td>statement(s)</td>";               //current statement
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
<?php
$statement='Cap Value for Second Chance';

echo"<tr>";
echo "<td>$statement</td>";
echo '<td><input class="example" type="text" name="text[]" /></td>';
echo"</tr>";
?>
<?php
        $query1 = "SELECT distinct class FROM studentlist ";
        $res3 = $db->select($query1);
        $res1=null;
    ?>
<form name="form1" enctype="multipart/form-data" method="post" action="">
<label>
  <h1>Select class</h1>
<select name="selectfile">

            <?php while($row = mysqli_fetch_assoc($res3)): ?>

              <li><option value="<?php echo $row['class']?>"><?php echo $row['class']?></option></li>


            <?php endwhile;?>


</select>
</label>

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
