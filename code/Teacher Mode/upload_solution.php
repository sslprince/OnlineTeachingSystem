<?php session_start();?>
<?php include 'database.php';?>

<?php
    
    $name =$_SESSION['name'];
    $a = "";
    $myfile = fopen("c.txt", "r") or die("Unable to open file!");
    while(!feof($myfile)) {
        $a = $a .fgets($myfile) . "<br>";
    }
    echo $a;

?>
<?php
    $query ="UPDATE file SET solution = '$a' WHERE name = 'main.c'";
    
    $res = mysqli_query($con,$query);
?>


