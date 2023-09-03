<?php
include('../include/connection.php');
$id = $_POST['id'];
$Utype = strtolower($_POST['name']);

$q = "SELECT * FROM user_type WHERE name = '$Utype' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q = "UPDATE user_type SET name='$Utype' WHERE id='$id'";
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