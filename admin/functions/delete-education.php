<?php 
include '../include/connection.php';
$id = $_POST['id'];
$q = "DELETE FROM sch_education_level WHERE id = '$id'";
$d = mysqli_query($conn, $q);
if ($d) {
    echo '1';
}else{
    echo mysqli_error($conn);
}
?>