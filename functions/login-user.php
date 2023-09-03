<?php
session_start();
include '../inc/connection.php';
$uname = $_POST['uname'];
$pass = base64_encode($_POST['pass']);

$q = "SELECT * FROM sch_users WHERE username = '$uname' AND password = '$pass' AND status = '1'";
$d = mysqli_query($conn, $q);
if (mysqli_num_rows($d) != 0) {
    while ($t = mysqli_fetch_assoc($d)) {
        $id = $t['id'];
        $name = $t['name'];
        $username = $t['username'];
        $userTypeID = $t['userTypeID'];
        $_SESSION['UID'] = $id;
        $_SESSION['UNAME'] = $username;
        $_SESSION['NAME'] = $name;
        $_SESSION['UTYPE'] = $userTypeID;
        $_SESSION['ALS'] = 1;//change  in  head.php/admin (SWALS) 
        echo '1';
    }
}else{
    echo '2';
}

?>