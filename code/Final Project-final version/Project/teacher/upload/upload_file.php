<?php include 'database.php';?>
<?php //include 'header.php';?>
<?php include 'config/Config.php';?>
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
<link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/dashboard.css" rel="stylesheet">



<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->


<!-- Custom styles for this template -->
<link rel="stylesheet" href="../../css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>


  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="../upload/index.php">Teacher mode</a>


    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/viewcode.php">View C Code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../upload/teacher_index.php">Edit C Code</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../marks/marks.php">Students' Marks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../errors/errors.php">Error Analytics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../student_information/information.php">Students' Information</a>
            </li>
          </ul>
        </nav>


<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <div style='text-align:center'><h1>Result</h1></div>
    <section class="row text-center placeholders">
      <div class="col-6 col-sm-3 placeholder">
        <div style="text-align:left"><h2>Code:</h2></div>
          <textarea name="comment" rows="15" cols="35">
<?php
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: please add a c file " . $_FILES["file"]["error"] . "<br />";
    }
    else

    {

        global $a;
        $c="";
        $a1="";
        $b =$_FILES["file"]["name"];
        $myfile = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");

        while(!feof($myfile)) {
            $a = $a .fgets($myfile);

        }

        //echo $a;
        $query = "INSERT INTO file(name,source_file)VALUES('$b','$a')";
        $res = $db->insert($query);
        fclose($myfile);
        $myfile1 = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
        //$aa=0;
        $start=100;
        $count1=0;
        $code1="";
        while(!feof($myfile1)) {
            $code1 =  $code1 .fgets($myfile1);
          //  $aa=$aa+1;
        }

        $code=(explode("\n",$code1));
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
            echo $code[$i]. "\n";
            $count1++;
          }
          else
          {
            echo "    ";
            echo $code[$i]."\n";
          }
        }
        //echo $aa;
        //echo $a1;
        $myfile1 = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
        while(!feof($myfile1)) {
            $c = $c .fgets($myfile1);

        }
        fclose($myfile1);

        $myoutputfile = fopen("../../main.c", "w");
        fwrite($myoutputfile, $c);
        fclose($myoutputfile);
        $_SESSION['name'] = $b;
        if(file_exists("../../b.txt")){
            unlink("../../b.txt");
        }
        if(file_exists("../../c.txt")){
            unlink("../../c.txt");
        }
        if(file_exists("../../d.txt")){
            unlink("../../d.txt");
        }
        #＃$cmd = "sudo ./aa.sh";
        #$cmd1 = "sudo ./aa.sh";

        #$cmd2 = "ls";
        #$output =exec($cmd);
        #system($cmd1,$output1);
        #echo $output;


    }
    ?>
  </textarea>

<a href="upload_solution.php" title=""></a>



<input type="button" class="btn btn-info" onClick="clicke()" value="Generate"/>
<button type="button" class="btn btn-info" onclick="foo()">Upload</button>
</div>




<div id="shouts">
  <h2>Solution:</h2>
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

</div>
</div>

</body>
</html>
