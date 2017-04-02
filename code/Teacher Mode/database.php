<?PHP
    $con = mysqli_connect("localhost","root","","sourcefile");
    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySOL'.$mysqli_connect_error();
    }
