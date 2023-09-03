<?php
include('../include/connection.php');
$name = strtolower($_POST['name']);
$email = strtolower($_POST['email']);
$mob = $_POST['mobile'];
$curTime = time();

$file_name = $_FILES['img']['name'];
$file_tem_name = $_FILES['img']['tmp_name'];
$file_size = $_FILES['img']['size'];
$file_type = $_FILES['img']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];


if($file_name != ""){
    if(move_uploaded_file($file_tem_name, '../upload/student/'. $newFilename)){
        $q = "INSERT INTO studentdata(name , email, mobile, addedtime, studimg) VALUES('$name', '$email', '$mob', '$curTime', '$newFilename')";
        $d = mysqli_query($conn, $q);
    if($d){
        echo "Data Saved";
        header('location: ../view/student-data.php');
        }else{
        echo mysqli_error($conn);
        } 
    }else{
        echo "Something went wrong";
    }
}else{
    echo "Student Image Empty";
}      

?>