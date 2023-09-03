<?php
include('../include/connection.php');

$Utype = strtolower($_POST['name']);

$q = "SELECT * FROM user_type WHERE name = '$Utype'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q = "INSERT INTO user_type (name, status) VALUES('$Utype', '1')";
    $d = mysqli_query($conn, $q);
    if($d){
        echo '1';
    }else{
        echo mysqli_error($conn);
    } 
}else{
    echo '2';
}


?>