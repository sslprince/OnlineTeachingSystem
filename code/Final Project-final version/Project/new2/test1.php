<?php
include 'database.php';
session_start();
?>
<form method="POST">
<select name="select1" id="select1" onchange="setTextField(this)">
  <?php
  $query = "SELECT `class` FROM `studentlist` WHERE username='bill'";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  echo "<option value='0'>Please select</option>";
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    foreach($query_row as $value)
    {
      echo "<option value= $value >$value</option>";
      $i++;
    }
  }
  ?>

</select>

<select name="select2" id="select2">
  <?php
  $save=$_POST['select1'];
  $query = "SELECT `name`, `class` FROM `file`";
  if(!$query_run= mysql_query($query))
  {
    echo "fail";
  }
  echo "<option value='0'>Please select</option>";
  while($query_row = @mysql_fetch_assoc($query_run))
  {
    $class = $query_row['class'];
    $name = $query_row['name'];
    if($save==$calss)
    {
      echo "<option value= $class >$name</option>";
    }
  }
  ?>
</select>

<textarea>
<?php
if(isset($_POST['select1'])){
$var = $_POST['select1'];
echo $var;
}

 ?>
 </textarea>
</form>
