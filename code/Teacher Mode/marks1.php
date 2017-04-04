<?php include 'database.php';?>
<?php include 'header.php';?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->
<?php
$xdata=array();
$ydata=array();
?>
<?php
        $query = "SELECT distinct filename FROM Score";
        $res = mysqli_query($con,$query);
        $res1=null;
    ?>


<!-- Custom styles for this template -->

<link rel="stylesheet" href="css/mark.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


  <div class ="parent">
  <form name="form1" enctype="multipart/form-data" method="post" action="">
  <label>
    <h1>Select</h1>
  <select name="select">

              <?php while($row = mysqli_fetch_assoc($res)): ?>

                <li><option value="<?php echo $row['filename']?>"><?php echo $row['filename']?></option></li>


              <?php endwhile;?>


</select>
</label>
<label>
<input type="submit" name="Submit" value="Submit">
</label>
</form>
<?php
if( $_POST )
{

  $a = $_POST['select'];
  $query1 = "SELECT studentname,score FROM Score WHERE filename = '$a'";
  $res1 = mysqli_query($con,$query1);


?>
<table width=300 border=1 align="center">
<caption><h2><?php echo $a?></h2></caption>
      <tr>
           <td>studentname</td>
           <td>score</td>
      </tr>
      <?php $count = 0;?>
      <?php while($row = mysqli_fetch_assoc($res1)){
        global $count;
        global $xdata;
        global $ydata;
        $xdata[]=$row['studentname'];
        $ydata[]=$row['score'];
        echo"<tr>";

           echo"<td>".$xdata[$count]."</td>";
           echo"<td>".$ydata[$count]."</td>";

        echo"</tr>";
        $count++;
      }?>

</table>

<div class ="child">
<img src="lalalal.jpg">
</div>
</div>

<?php } ?>

<header>
<h1>Source File </h1>
</header>
<ul>
<?php

        $query = "SELECT * FROM Score";
        $res = mysqli_query($con,$query);

    ?>




<table width=300 border=1 align="center">
<caption><h2>MARK TABLE</h2></caption>
      <tr>
           <td>ID</td>
           <td>studentname</td>
           <td>filename</td>
           <td>score</td>
      </tr>
      <?php while($row = mysqli_fetch_assoc($res)){
        echo"<tr>";
          echo"<td>".$row['ID']."</td>";
           echo"<td>".$row['studentname']."</td>";
           echo"<td>".$row['filename']."</td>";
           echo"<td>".$row['score']."</td>";

        echo"</tr>";
      }?>

</table>


<?php
require_once ("jpgraph-4.0.2/jpgraph/jpgraph.php");
require_once ("jpgraph-4.0.2/jpgraph/jpgraph_bar.php");

global $xdata;
global $ydata;

$graph = new Graph(300,200);  //创建新的Graph对象
$graph->SetScale("textlin");  //刻度样式
$graph->SetShadow();          //设置阴影
$graph->img->SetMargin(40,20,30,40); //设置边距

$graph->graph_theme = null; //设置主题为null，否则value->Show(); 无效

$barplot = new BarPlot($ydata);  //创建BarPlot对象
$barplot->SetFillColor('blue'); //设置颜色
$barplot->value->Show(); //设置显示数字
$graph->Add($barplot);  //将柱形图添加到图像中

$graph->title->Set("Score Statistic");
$graph->xaxis->title->Set("studentname"); //设置标题和X-Y轴标题
$graph->yaxis->title->Set("Score");
$graph->title->SetColor("red");
$graph->title->SetMargin(10);
$graph->xaxis->title->SetMargin(5);
$graph->xaxis->SetTickLabels($xdata);


$graph->Stroke("lalalal.jpg");
?>


<a href="upload_solution.php" title=""></a>

</ul>

<input type="button" onClick="clicke()" value="Generate"/>
<button type="button" onclick="foo()">Upload</button>
</div>

<header>
<h1>Solution </h1>
</header>


<ul>
<p id="demo"></p>
<script>
function clicke(){
    alert("Please generate solution by terminal,then click upload");
}


</script>
<script>

function foo () {
    $.ajax({
           url:"upload_solution.php", //the page containing php script
           type: "POST", //request type
           success:function(result){
           document.getElementById("demo").innerHTML = result;
           }
           });
}
</script>


</ul>



</body>
</html>
