<?php
include('../include/connection.php');

$class = strtoupper($_POST['name']);
$Ctime = time();

$q = "SELECT * FROM sch_education_level WHERE levelname = '$class'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    
    $qa = "SELECT * FROM sch_education_level ORDER BY ord DESC LIMIT 1";
    $da = mysqli_query($conn, $qa);
    if (mysqli_num_rows($da) != 0) {
        while ($ta = mysqli_fetch_assoc($da)) {
            $order = $ta['ord']+1;
        }
    }else{
        $order = 1;
    }

    $q1 = "INSERT INTO sch_education_level (levelname, ord, addedtime, status) VALUES('$class', '$order', '$Ctime', '1')";
    $d1 = mysqli_query($conn, $q1);
    if($d1){
        echo '1';
    }else{
        echo mysqli_error($conn);
    }

}else{
    echo '2';
}
?>