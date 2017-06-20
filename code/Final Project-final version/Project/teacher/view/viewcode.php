<?php include 'database.php';?>
<?php include 'config/Config.php';?>
<?php include 'header.php';?>
<?php session_start();?>
<?php
  $db = new database();
?>
<!DOCTYPE html>
<html>
<head>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/choose0.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/dashboard.css" rel="stylesheet">


<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->

<?php
        $query = "SELECT distinct name FROM file";
        $res = $db->select($query);
        $res1=null;
    ?>


<!-- Custom styles for this template -->

<link rel="stylesheet" href="../../css/mark.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<form name="form1" enctype="multipart/form-data" method="post" action="">
    <label>
    <caption><h2>Select filename</h2></caption>
        <select name="select">

              <?php while($row = mysqli_fetch_assoc($res)): ?>

                <li><option value="<?php echo $row['name']?>"><?php echo $row['name']?></option></li>


              <?php endwhile;?>


          </select>
        </label>
  <label>
    <input type="submit" class="btn btn-info" name="Submit" value="Results">
  </label>
</form>
<div class ="parent">
<div style="text-align:left"><h2>Code:</h2></div>
<textarea name="comment" rows="15" cols="35">
<?php

if( $_POST )
{

  $a = $_POST['select'];
  $query1 = "SELECT * FROM file  WHERE name = '$a'";
  $res1 = $db->select($query1);
  $start=100;
  $count1=0;
   while($row = mysqli_fetch_assoc($res1)){
    //echo"<tr>";
        $str1= $row['source_file'];
      // echo"<td>".$row['source_file']."</td>";
       //echo"<td>".$row['avg(score)']."</td>";
       //echo"<td>".$row['MAX(score)']."</td>";
       //echo"<td>".$row['MIN(score)']."</td>";

    //echo"</tr>";

  }
  $code=(explode("\n",$str1));
  for($i=0;$i<sizeof($code);$i++)                    //how many columns
  {
    if(!strcmp($code[$i],"int main(int argc, const char * argv[]) {"))
    {
      $start=$i;
    }
    if($i>=$start)
    {
      echo "$count1";
      echo "    ";
      echo "$code[$i]\n";
      $count1++;
    }
    else
    {
      echo "    ";
      echo "$code[$i]\n";
    }
  }
?>
</textarea>
</div>
<div class ="child">
<div style="text-align:left"><h2>Solution:</h2></div>
<table class = "table table-striped">
     <tr>
<?php
$query1 = "SELECT `variable` FROM `file` WHERE name='$a' ";
$res = $db->select($query1);
$query2 = "SELECT `solution` FROM `file` WHERE name='$a' ";
$res1 = $db->select($query2);
$query3 = "SELECT `statement` FROM `file` WHERE name='$a' ";
$res2 = $db->select($query3);
$var = array();
$var1 = array();
$var2 = array();
if($res==false||$res1==false||$res2==false){
    echo "<script>alert('Record not exist')</script>";
}
else{
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

while($row2 = mysqli_fetch_assoc($res2))
{
  foreach($row2 as $value2)
  {
    $str2=$value2;
  }
}
$var2=(explode("\n",$str2));
if($var2[0]==null){
  echo "<script>alert('Statement not exist')</script>";
}
else{
$w=0;
for($i=0;$i<sizeof($var1)-1;$i=$i+$size-1)
                    //how many columns
{

  echo"<tr>";
  echo "<td>$var2[$w]</td>";
  for($j=0;$j<$size-1;$j++){
    $z=$j+$i;
    echo "<td>$var1[$z]</td>";
  }
  $w=$w+1;
  echo"</tr>";
}
}
}
?>
</tr>
</table>
</div>
</div>









<input type="button" onClick="window.location.href='marks.php'" value="Back"/>







</body>
</html>
<?php } ?>
