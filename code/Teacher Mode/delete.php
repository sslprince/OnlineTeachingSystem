<?php
    include 'database.php';
    if(isset($_POST['submit'])){
  
        $message = mysqli_real_escape_string($con,$_POST['message']);
        
        
        if(!isset($message)||$message==''){
            $error = "please fill in the file name";
            header("Location: a.php?error".urlencode($error));
        }
        else{
            $query = "DELETE FROM file WHERE name = '$message'";
            if(!mysqli_query($con,$query)){
                die('Error: '.mysqli_error($con));
            }else{
                header("LOcation: a.php");
                exit();
            }
        }
    }