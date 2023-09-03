<?php
include('../include/connection.php');
$id = $_POST['id'];
$classId = $_POST['classId'];
$secationName = strtoupper($_POST['name']);

$q = "SELECT * FROM sch_class_section WHERE classId = '$classId' AND secationName = '$secationName' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q = "UPDATE sch_class_section SET classId='$classId', secationName='$secationName' WHERE id='$id'";
    $d = mysqli_query($conn, $q);
    if ($d) {
        echo '1';
    }else{
       echo mysqli_error($conn);
    }
}else{
    echo "2";
}

?>