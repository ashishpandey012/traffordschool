<?php
include('../include/connection.php');

$id = $_POST['id'];
$name = strtoupper($_POST['name']);
$username = strtolower($_POST['username']);
$email = strtolower($_POST['email']);
$pass = $_POST['password'];
$dob = $_POST['dob'];
$mob = $_POST['mobile'];
$edulevId = $_POST['edulevId'];
$classId = $_POST['classId'];
$classSection = $_POST['classSection'];

$file_name = $_FILES['stdImg']['name'];
$file_tem_name = $_FILES['stdImg']['tmp_name'];
$file_size = $_FILES['stdImg']['size'];
$file_type = $_FILES['stdImg']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

$q = "SELECT * FROM sch_registration WHERE (username = '$username' OR email = '$email' OR mobile = '$mob') AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q1 = "UPDATE sch_registration SET name='$name', username='$username', email='$email', password='$pass', dob='$dob', mobile='$mob', eduLevID = '$edulevId', classId = '$classId', classSection = '$classSection', img ='$newFilename'  WHERE id='$id'";
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

