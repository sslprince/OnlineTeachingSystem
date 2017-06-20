<?php include 'config/Config.php';?>
<?php
    include 'database.php';
    $db = new database();
    echo $_POST['message'];
    if(isset($_POST['submit'])){
        $message = $_POST['message'];
      //  $message = 'c2.c';

        if(!isset($message)||$message==''){
            $error = "please fill in the file name";
            header("Location: teacher_index.php?error".urlencode($error));
        }
        else{
            $query = "DELETE FROM file WHERE name = '$message'";
            if(!$db->delete($query)){
                die('Error: '.mysqli_error($con));
            }else{
                header("LOcation: teacher_index.php");
                exit();
            }
        }
    }
