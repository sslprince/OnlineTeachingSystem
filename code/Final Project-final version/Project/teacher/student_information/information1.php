
<?php include 'database.php';?>
<?php include 'header.php';?>
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



<title>Memory Trace Teacher Mode</title>

<!-- Bootstrap core CSS -->


<!-- Custom styles for this template -->
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link href="../../css/bootstrap.css" rel="stylesheet">
  <link href="../../css/dashboard.css" rel="stylesheet">
<script src="jquery-3.2.0.slim.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <table class = "table table-striped">
         <caption><h2>You have uploaded successfully</h2></caption>
               <tr>
                    <td>username</td>
                      <td>firstname</td>
                        <td>lastname</td>
                     <td>class</td>
               </tr>

<?php
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: please add a c file " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        $a="";
        $c="";
        $a1="";
        //$code2=array();
        $b =$_FILES["file"]["name"];
        $myfile = fopen($_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a = $a.fgets($myfile);
        }
        $code=(explode("\n",$a));
        for($i=1;$i<sizeof($code);$i++)                    //how many columns
        {
          echo"<tr>";
          $arr= array("\n", "\r", "\r\n");
          $code1=str_replace($arr,"",$code[$i]);
          $class1 = str_replace($arr,"",$code[0]);
          $str=",";
          $class = str_replace($str,"",$class1);
          $key="";
          $code2=(explode(",",$code1));

          $username=$code2[0];
          $firstname=$code2[1];
          $lastname=$code2[2];
          $key=$username.$class;


          $query = "replace INTO studentlist(username,class,valuekey,firstname,lastname)VALUES('$username','$class','$key','$firstname','$lastname')";
          $res = $db->insert($query);
          $query1 = "SELECT  clientlist.username,studentlist.firstname,studentlist.firstname FROM clientlist inner join studentlist on '$username'=clientlist.username";
          $res1 = $db->select($query1);

          if($res1==false){

            $query2 = "Insert INTO clientlist(username,password,symbol)VALUES('$username','1','s')";
            $res2 = $db->insert($query2);
          }

          echo"<td>".$username."</td>";
          echo"<td>".$firstname."</td>";
          echo"<td>".$lastname."</td>";
          echo"<td>".$class."</td>";

          echo"<tr>";


        }
        //}
        }


        /*$query = "INSERT INTO file(name,source_file)VALUES('$b','$a')";
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
    }*/
    ?>
  </tr>
  </table>
</div>
</body>
</html>
