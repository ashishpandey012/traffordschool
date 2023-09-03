<?php
include('../include/connection.php');
$id = $_POST['id'];
$tableName = $_POST['tableName'];
$q = "UPDATE $tableName SET status = '1' WHERE id = '$id'";
$d = mysqli_query($conn, $q);
if($d){
    echo '1';
}else{
    echo mysqli_error($conn);
}
?>