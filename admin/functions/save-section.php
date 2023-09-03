<?php
include('../include/connection.php');

$classId = $_POST['classId'];
$sectionName = strtoupper($_POST['name']);
$cTime = time();

$q = "SELECT * FROM sch_class_section WHERE classId = '$classId' AND secationName = '$sectionName' ";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q1 = "INSERT INTO sch_class_section (classId, secationName, addedTime, status ) VALUES ('$classId', '$sectionName', '$cTime', '1')";
    $d1 = mysqli_query($conn, $q1);
    if($d1){
        echo "1";
    }else{
        echo mysqli_error($conn);
    }

}else{
    echo "2";
}

?>