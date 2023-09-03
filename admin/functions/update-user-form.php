<?php
include('../include/connection.php');

$id = $_POST['id'];
$userType = $_POST['userType'];
$name = strtoupper($_POST['name']);
$username = $_POST['username'];
$email = base64_encode(strtolower($_POST['email']));
$password = base64_encode($_POST['password']);

$q = "SELECT * FROM sch_users WHERE (username = '$username' OR email = '$email') AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q1 = "UPDATE sch_users SET userTypeID='$userType', name='$name', username='$username', email='$email', password='$password'  WHERE id='$id'";
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

