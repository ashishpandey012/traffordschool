<?php
include('../include/connection.php');

$name = strtoupper($_POST['name']);
$cTime = time();

$file_name = $_FILES['Fimg']['name'];
$file_tem_name = $_FILES['Fimg']['tmp_name'];
$file_size = $_FILES['Fimg']['size'];
$file_type = $_FILES['Fimg']['type'];

$fileNameArr = explode(".", $file_name);
$newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

$q = "SELECT * FROM sch_form4 WHERE name = '$name'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0) {
    if(move_uploaded_file($file_tem_name, '../../upload/'. $newFilename)) {
        $q2 = "INSERT INTO sch_form4(name, image, addedTime, status) VALUES ('$name', '$newFilename', '$cTime', '1')";
        $d2 = mysqli_query($conn, $q2);
        if($d2){
            $q3 = "SELECT * FROM sch_form4 WHERE addedTime = '$cTime'";
            $d3 =mysqli_query($conn, $q3);
            if(mysqli_num_rows($d3) != 0 ){
                while($t3 = mysqli_fetch_assoc($d3)){
                    $nameclassId = $t3['id'];
                    echo $nameclassId;
                }
            }
        }else{
            echo mysqli_error($conn);
        }
    }else{
        echo "3";
    }
}else{
    echo "Already Exist";
}

?>