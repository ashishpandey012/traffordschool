<?php
include('../include/connection.php');
$id = $_POST['id'];
$userType = $_POST['UserType'];
$name = strtoupper($_POST['name']);

$q = "SELECT * FROM sch_form3 WHERE name = '$name' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q1 = "UPDATE sch_form3 SET userTypeID = '$userType', name = '$name'  WHERE id='$id'";
    $d1 = mysqli_query($conn, $q1);
    if ($d1) {
        echo '1';
    }else{
        echo mysqli_error($conn);
    }

}else{
    echo "2";
}

?>