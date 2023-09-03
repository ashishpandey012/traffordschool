<?php
include('../include/connection.php');   
$name = strtoupper($_POST['name']);               
$email = strtolower($_POST['email']); 
$mob = $_POST['contact'];                   
$cTime = time();

$file_name = $_FILES['stdImg']['name'];
$file_tem_name = $_FILES['stdImg']['tmp_name'];
$file_size = $_FILES['stdImg']['size'];
$file_type = $_FILES['stdImg']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

//select query executing 
$q = "SELECT * FROM sch_teacherdata WHERE contact = '$mob' OR email = '$email'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){ 
    if(move_uploaded_file($file_tem_name, '../../upload/teacher/'. $newFilename)){
        $q = "INSERT INTO sch_teacherdata (name, email, contact, teachimg, addedtime, status) VALUES ('$name', '$email', '$mob', '$newFilename', $cTime,  '1')";
        $d = mysqli_query($conn, $q);
        if($d){
            echo '1';  
        }else{
            echo mysqli_error($conn);  
        } 
    }else{
        echo "3";
    }

    

}else{
    echo '2'; ////if no. of rows are zero than echo 2
}


?>