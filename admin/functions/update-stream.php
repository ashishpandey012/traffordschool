<?php
include('../include/connection.php');
$id = $_POST['id'];
$class = $_POST['name'];

$q = "SELECT * FROM sch_stream WHERE streamname = '$class' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q = "UPDATE sch_stream SET streamname='$class' WHERE id='$id'";
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