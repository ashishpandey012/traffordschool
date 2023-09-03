<?php
include('../include/connection.php');

$class = $_POST['name'];
$Ctime = time();

$q = "SELECT * FROM sch_stream WHERE streamname = '$class'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q = "INSERT INTO sch_stream (streamname, addedtime, status) VALUES('$class', '$Ctime', '1')";
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