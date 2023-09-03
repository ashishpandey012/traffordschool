<?php
include('../include/connection.php');
$id = $_POST['id'];
$class = strtoupper($_POST['name']);
$order = $_POST['order'];

$q = "SELECT * FROM sch_education_level WHERE levelname = '$class' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q = "UPDATE sch_education_level SET levelname='$class', ord='$order' WHERE id='$id'";
    $d = mysqli_query($conn, $q);
    if ($d) {
        echo '1';
    }else{
        echo mysqli_error($conn);
    }
}else{
    echo '2';
}

?>