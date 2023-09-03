<?php
include('../include/connection.php');

$userId = $_POST['userid'];
$name = strtolower($_POST['name']);
$email = strtolower($_POST['email']);
$mob = $_POST['contact'];

$file_name = $_FILES['img']['name'];
$file_tem_name = $_FILES['img']['tmp_name'];
$file_size = $_FILES['img']['size'];
$file_type = $_FILES['img']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

if($file_name != ""){
    move_uploaded_file($file_tem_name, '../upload/teacher/'. $newFilename);
    $q = "UPDATE teacherdata SET name = '$name', email = '$email', contact = '$mob', teachimg ='$newFilename' WHERE id = '$userId'";


}else{
    $q = "UPDATE teacherdata SET name = '$name', email = '$email', contact = '$mob'  WHERE id = '$userId'";
}

$d = mysqli_query($conn, $q);
if($d){
    echo "Update Successfully";
    header('location: ../view/teacher-data.php');
}else{
    mysqli_error($conn);
}
?>