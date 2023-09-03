<?php
include('../include/connection.php');
$id = $_POST['id'];
$tableName = $_POST['tableName'];
$q = "DELETE FROM $tableName WHERE id = '$id'";
$d = mysqli_query($conn, $q);
if($d){
    echo '1';
}else{
    echo mysqli_error($conn);
}
?>