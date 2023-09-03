<?php
include('../include/connection.php');

$name = strtoupper($_POST['name']);
$username = strtolower($_POST['username']);
$email = strtolower($_POST['email']);
$pass = $_POST['password'];
$dob = $_POST['dob'];
$mob = $_POST['mobile'];
$edulevId = $_POST['edulevId'];
$classId = $_POST['classId'];
$classSection = $_POST['classSection'];
$cTime = time();

$file_name = $_FILES['stdImg']['name'];
$file_tem_name = $_FILES['stdImg']['tmp_name'];
$file_size = $_FILES['stdImg']['size'];
$file_type = $_FILES['stdImg']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

$q = "SELECT * FROM sch_registration WHERE username = '$username' OR email = '$email' OR mobile = '$mob'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    if(move_uploaded_file($file_tem_name, '../../upload/student/'. $newFilename)){
        $q1 = "INSERT INTO sch_registration (name, username, email, password, dob, mobile, eduLevID, classId, classSection, img, addedtime, status ) VALUES('$name', '$username', '$email', '$pass', '$dob', '$mob', '$edulevId', '$classId', '$classSection', '$newFilename', '$cTime', '1')";
        $d1 = mysqli_query($conn, $q1);
        if($d1){
            echo '1';
        }else{
            echo mysqli_error($conn);
        } 
    }else{
        echo '3';
    }
    
}else{
    echo '2';
}


?>