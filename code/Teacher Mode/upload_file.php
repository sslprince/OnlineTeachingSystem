<?php include 'database.php';?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/style.css" type="text/css"/>

<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
<button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#">Teacher Mode</a>

<div class="collapse navbar-collapse" id="navbarsExampleDefault">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Student Mode</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Help</a>
</li>
</ul>
<form class="form-inline mt-2 mt-md-0">
<input class="form-control mr-sm-2" type="text" placeholder="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
</nav>

<div class="container-fluid">
<div class="row">
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="a.php">Upload C Code</a>

</li>
<li class="nav-item">
<a class="nav-link" href="#">Students' Marks</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Error Analytics</a>
</li>
</ul>

</nav>

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
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    
    {
        
        global $a;
        $c="";
        $b =$_FILES["file"]["name"];
        $myfile = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a = $a .fgets($myfile) . "<br>";
            
        }
        echo $a;
        $query = "INSERT INTO file(name,source_file)VALUES('$b','$a')";
        $res = mysqli_query($con,$query);
        fclose($myfile);
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

</body>
</html>