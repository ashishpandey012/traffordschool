<?php
include('../include/connection.php');
$UserType = $_POST['UserType'];
$name = strtoupper($_POST['name']);
$Ctime = time();

$q = "SELECT * FROM sch_form3 WHERE name = '$name'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q = "INSERT INTO sch_form3 (userTypeID, name, addedTime, status)  VALUES('$UserType', '$name', '$Ctime', '1')";
    $d = mysqli_query($conn, $q);
    if($d){
       $q2 = "SELECT * FROM sch_form3 WHERE addedTime = '$Ctime'";
       $d2 = mysqli_query($conn, $q2);
       if(mysqli_num_rows($d2) != 0){
            while($t2 = mysqli_fetch_assoc($d2)){
                $UserTypeId = $t2['id'];
                echo $UserTypeId;
            }
       }
    }else{
        echo mysqli_error($conn);
    } 
}else{
    echo 'Already Exist';
}
?>