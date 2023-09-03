<?php
include('../include/connection.php');

$name = strtoupper($_POST['name']);
$gender  = strtoupper($_POST['gender']);
$Ctime = time();

$q = "SELECT * FROM sch_form2 WHERE name = '$name'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q = "INSERT INTO sch_form2 (name, gender, addedTime, status) VALUES('$name', '$gender', '$Ctime', '1')";
    $d = mysqli_query($conn, $q);
    if($d){
     $q1 = "SELECT * FROM sch_form2 WHERE addedTime = '$Ctime'"; 
     $d1 = mysqli_query($conn, $q1);
     if(mysqli_num_rows($d1) != 0){
        while($t1 = mysqli_fetch_assoc($d1)){
            $nameclassId = $t1['id'];
            echo $nameclassId;
        }
     }
    }else{
        echo mysqli_error($conn);
    } 
}else{
    echo '2';
}


?>