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


<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div id = "container">

<div id = "container1">
<header>
<h1>Source File </h1>
</header>
<div id="shouts1">
<ul>
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

        echo $a;
        $query = "INSERT INTO file(name,source_file)VALUES('$b','$a')";
        $res = mysqli_query($con,$query);
        fclose($myfile);
        $myfile1 = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");

        while(!feof($myfile1)) {
            $a1 = $a1 .fgets($myfile1) . "<br>";

        }

        echo $a1;
        $myfile1 = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
        while(!feof($myfile1)) {
            $c = $c .fgets($myfile1);

        }
        fclose($myfile1);

        $myoutputfile = fopen("main.c", "w");
        fwrite($myoutputfile, $c);
        fclose($myoutputfile);
        $_SESSION['name'] = $b;
        if(file_exists("b.txt")){
            unlink("b.txt");
        }
        if(file_exists("c.txt")){
            unlink("c.txt");
        }
        if(file_exists("d.txt")){
            unlink("d.txt");
        }
        #＃$cmd = "sudo ./aa.sh";
        #$cmd1 = "sudo ./aa.sh";

        #$cmd2 = "ls";
        #$output =exec($cmd);
        #system($cmd1,$output1);
        #echo $output;


    }
    ?>
<a href="upload_solution.php" title=""></a>

</ul>
</div>
<input type="button" onClick="clicke()" value="Generate"/>
<button type="button" onclick="foo()">Upload</button>
</div>
<div id = "container2">
<header>
<h1>Solution </h1>
</header>

<div id="shouts">
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
</div>
</div>
</body>
</html>
