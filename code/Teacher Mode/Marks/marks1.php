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
<?php
    $query = "SELECT filename,avg(score),MAX(score),MIN(score) from Score group by filename";
    $re = $db->select($query);
?>
<!-- Bootstrap core CSS -->
<?php
$xdata=array();
$ydata=array();
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
    <table class = "table table-striped">
    <caption><h2>MARK TABLE</h2></caption>
          <tr>
               <td>Filename</td>
               <td>Average score</td>
                <td>Max score</td>
                <td>Min score</td>
          </tr>

          <?php while($row = mysqli_fetch_assoc($re)){
            echo"<tr>";

               echo"<td>".$row['filename']."</td>";
               echo"<td>".$row['avg(score)']."</td>";
               echo"<td>".$row['MAX(score)']."</td>";
               echo"<td>".$row['MIN(score)']."</td>";

            echo"</tr>";

          }?>


    </table>
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
<input type="submit" name="Submit" value="Submit">
</label>
</form>
<?php
$ga=0;
$gb=0;
$gc=0;
$gd=0;
$ge=0;
if( $_POST )
{

  $a = $_POST['select'];
  $query1 = "SELECT Score.studentname,Score.score,clientlist.class FROM Score,clientlist  WHERE filename = '$a' AND Score.studentname=clientlist.username And clientlist.symbol ='s' Order by Score.score desc";
  $res1 = $db->select($query1);
  $query2 ="SELECT avg(score) FROM Score,clientlist WHERE filename = '$a'AND Score.studentname=clientlist.username";
  $res2 = $db->select($query2);
?>
<table class = "table table-striped">
<caption><h2><?php echo $a?></h2></caption>
      <tr>
           <td>studentname</td>

           <td>score</td>
            <td>class</td>
      </tr>
      <?php $count = 0;?>
      <?php while($row = mysqli_fetch_assoc($res1)){
        global $count;
        global $xdata;
        global $ydata;
        global $ga;
        global $gb;
        global $gc;
        global $gd;
        global $ge;
        if($row['score']>=85){
          $ga++;
        }
        else if($row['score']<85&&$row['score']>=75){
          $gb++;
        }
        else if($row['score']<75&&$row['score']>=65){
          $gc++;
        }
        else if($row['score']<65&&$row['score']>=50){
          $gd++;
        }
        else if($row['score']<50){
          $ge++;
        }
        $xdata[]=$row['studentname'];
        $ydata[]=$row['score'];
        echo"<tr>";

           echo"<td>".$xdata[$count]."</td>";
           echo"<td>".$ydata[$count]."</td>";
           echo"<td>".$row['class']."</td>";


        echo"</tr>";
        $count++;
      }?>
      <?php while($row2 = mysqli_fetch_assoc($res2)){
      $xdata[]="average";
      $ydata[]=$row2['avg(score)'];
      echo"<td>"."average"."</td>";
      echo"<td>".$row2['avg(score)']."</td>";
    }?>

</table>
<?php
global $ga;
global $gb;
global $gc;
global $gd;
global $ge;
require_once ("jpgraph-4.0.2/jpgraph/jpgraph.php");
require_once ("jpgraph-4.0.2/jpgraph/jpgraph_pie.php");
require_once ("jpgraph-4.0.2/jpgraph/jpgraph_pie3d.php");
/*global $xdata;
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
$graph->xaxis->SetTickLabels($xdata);*/
$data=array($ga,$gb,$gc,$gd,$ge);
$graph=new pieGraph(650,500);
$graph->img->SetMargin(30,30,80,40);
$graph->title->Set("Performace Level");
$pie3dplot=new piePlot3d($data);  //定义饼图
$pie3dplot->SetLegends(array('HD','D','C','P','F'));
$graph->legend->Pos(0.01,0.45,"left","center");
$graph->Add($pie3dplot);

$graph->Stroke('../../lalalal.jpg');
?>


<div class ="child">
<img src="../../lalalal.jpg">
</div>
</div>

<?php } ?>













<input type="button" onClick="window.location.href='marks.php'" value="Back"/>

</div>





</body>
</html>
