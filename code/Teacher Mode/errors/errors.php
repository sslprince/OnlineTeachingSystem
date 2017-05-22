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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/dashboard.css" rel="stylesheet">


<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->
<?php
$xdata=array();
$ydata=array();
$solutionarray = array();
$codearray = array();
?>
<?php
        $query = "SELECT distinct filename FROM Score";
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


  <div class ="parent">

  <form name="form1" enctype="multipart/form-data" method="post" action="">
  <label>
    <caption><h2>Select filename</h2></caption>
  <select name="select">

              <?php while($row = mysqli_fetch_assoc($res)): ?>

                <li><option value="<?php echo $row['filename']?>"><?php echo $row['filename']?></option></li>


              <?php endwhile;?>


</select>
</label>
<label>
<input type="submit" class="btn btn-info" name="Submit" value="Submit">
</label>
</form>
<?php
$ga=0;
$gb=0;
$gc=0;
$gd=0;
$ge=0;
global $solutionarray;
if( $_POST )
{

  $a = $_POST['select'];
  $query1 = "SELECT studentname,errorline,count(errorline) from Error WHERE filename = '$a'group by errorline";
  $res1 = $db->select($query1);
  $query2 = "SELECT count(studentname) from Error WHERE filename = '$a'";
  $res2 = $db->select($query2);
  $query3 = "SELECT variable,source_file,solution from file WHERE name = '$a'";
  $res3 = $db->select($query3);

?>
<table class = "table table-striped">
<caption><h2><?php echo $a?></h2></caption>
      <tr>
           <td>line</td>
           <td>expression</td>
            <td>percent</td>
            <td>correct answers</td>
            <td>common error answers</td>
      </tr>
      <?php $count = 0;?>
      <?php $row2 = mysqli_fetch_assoc($res2);
      $linecount = $row2['count(studentname)'];
      if($res3!=false){
      $row3 = mysqli_fetch_assoc($res3);

      $variable =$row3['variable'];
      $var=(explode("\n",$variable));
      $var_num =sizeof($var)-1 ;
                    //how many columns
      $solution =$row3['solution'];
      $var1=(explode("\n",$solution));


      for($i=0;$i<sizeof($var1)-1;$i=$i+3){
        $index="";
        $index = $var1[$i].",".$var1[$i+1].",".$var1[$i+2];
        $solutionarray[]=$index;


      }
      //echo $solutionarray[1];
      $sourcefile = $row3['source_file'];


    $sourcefile = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $sourcefile);
    $sourcefile = preg_replace('!^[ \t]*/\*.*?\*/[ \t]*[\r\n]!s', '', $sourcefile);
    $sourcefile = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $sourcefile);
    $var2=(explode("\n",$sourcefile));

  }?>
      <?php
      if($res3==false){
        echo "<script>alert('You have not upload this file')</script>";
      }
      else if(sizeof($solutionarray)==0){
      echo "<script>alert('You have not upload the right solution')</script>";
    }else{
      while($row = mysqli_fetch_assoc($res1)){
        $el =$row['errorline'];

        $query4 = "SELECT studentinput from Error WHERE filename = '$a' and errorline = '$el' ";
        $res4 = $db->select($query4);
        $query5 = "SELECT * from File WHERE name = '$a'  ";
        $res5 = $db->select($query5);
        $input ="";

        while($row1 = mysqli_fetch_assoc($res4)){
          $input1='('.$row1['studentinput'].')';

          if(!strpos($input,$input1)){
          $input = $input.' '.$input1;
        }

        }
        global $count;
        global $xdata;
        global $ydata;
        global $linecount;




        echo"<tr>";

           echo"<td>".$row['errorline']."</td>";
           if($res5!=false){
           echo"<td>".$var2[$row['errorline']+2]."</td>";
         }
         else{
         echo"<td>".""."</td>";
       }
           echo"<td>".$row['count(errorline)']/$linecount."</td>";
           if($res5!=false&&sizeof($solutionarray)!=0){
           echo"<td>".$solutionarray[$row['errorline']]."</td>";
         }


         else{
         echo"<td>".""."</td>";
       }
            echo"<td>".$input."</td>";

        echo"</tr>";
        $count++;
      }
    }?>


</table>

</div>

<?php } ?>













<input type="button" class="btn btn-info" onClick="window.location.href='marks.php'" value="Back"/>

</div>





</body>
</html>
