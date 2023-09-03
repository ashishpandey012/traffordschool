<?php
include('../include/connection.php');
$userId = $_GET['uid'];

$q = "DELETE FROM teacherdata WHERE id= '$userId'";
$d = mysqli_query($conn, $q);
if($d){
    echo "delete seccessfully";
    header('location: ../view/teacher-data.php');
}else{
    echo mysqli_error($d);
}
?>