<?php
include('../include/connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$mob = $_POST['contact'];
$curTime = time();

$file_name = $_FILES['img']['name'];
$file_tem_name = $_FILES['img']['tmp_name'];
$file_size = $_FILES['img']['size'];
$file_type = $_FILES['img']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

if($name != ""){
    if($email != ""){
        if($mob != ""){
            if($file_name != ""){
                if(move_uploaded_file($file_tem_name, '../upload/teacher/'. $newFilename)){
                    $q = "INSERT INTO teacherdata(name , email, contact, addedtime, teachimg) VALUES('$name', '$email', '$mob', '$curTime', '$newFilename')";
                    $d = mysqli_query($conn, $q);
                if($d){
                    echo "Data Saved";
                    header('location: ../view/teacher-data.php');
                   }else{
                    echo mysqli_error($conn);
                   } 
                }else{
                    echo "Something went wrong";
                }
            }else{
                echo "Teacher Image Empty";
            }      
        }else{
            echo "Mobile No. Empty";
        }
    }else{
        echo "Email Empty";
    }
}else{
    echo "Name is Empty";
}

?>
?>