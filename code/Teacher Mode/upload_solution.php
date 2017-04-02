<?php session_start();?>
<?php include 'database.php';?>

<?php
    
    $name =$_SESSION['name'];
    $a = "";
    $file = "c.txt";
    if(file_exists($file))
    {
        $myfile = fopen("c.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            $a = $a .fgets($myfile) . "<br>";
        }
        echo $a;
        $query ="UPDATE file SET solution = '$a' WHERE name = '$name'";
        
        $res = mysqli_query($con,$query);

    }
    else
    {
        echo "Please create solution according to the instruction and try again";
    }
?>

