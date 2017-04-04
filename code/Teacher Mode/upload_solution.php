<?php session_start();?>
<?php include 'database.php';?>

<?php

    $name =$_SESSION['name'];
    $a = "";
    $b = "";
    $b1 = "";
    $a1 ="";
    $file = "c.txt";
    $file1 = "d.txt";
    if(file_exists($file))
    {
        $myfile = fopen("c.txt", "r") or die("Unable to open file!");
        $myfile1 = fopen("c.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a = $a .fgets($myfile);
        }
        while(!feof($myfile1)) {
            $a1 = $a1 .fgets($myfile1) . "<br>";
        }
        echo $a1;
        $query ="UPDATE file SET solution = '$a' WHERE name = '$name'";

        $res = mysqli_query($con,$query);

    }
    else
    {
        echo "Please create solution according to the instruction and try again";
    }

    if(file_exists($file1))
    {
        $myfile1 = fopen("d.txt", "r") or die("Unable to open file!");
        $myfile2 = fopen("d.txt", "r") or die("Unable to open file!");
        while(!feof($myfile1)) {
            $b = $b .fgets($myfile1);
        }
        while(!feof($myfile2)) {
            $b1 = $b1 .fgets($myfile2) . "<br>";
        }
        echo $b;
        $query ="UPDATE file SET variable = '$b' WHERE name = '$name'";

        $res = mysqli_query($con,$query);

    }
    else
    {
        echo "Please create solution according to the instruction and try again";
    }

?>
