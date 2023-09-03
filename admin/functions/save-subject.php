<?php
include('../include/connection.php'); 

$streamId = $_POST['streamId'];
$sub = strtoupper($_POST['sub']);
$allCls = $_POST['allCls'];
$cTime = time();

$q = "SELECT * FROM sch_sub WHERE subjectName = '$sub'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    $q1 = "INSERT INTO sch_sub (streamId, subjectName, addedTime, status) VALUES ('$streamId', '$sub', '$cTime', '1')";
    $d1 = mysqli_query($conn, $q1);
    if($d1){

        $q2 = "SELECT * FROM sch_sub WHERE addedTime = '$cTime'";
        $d2  = mysqli_query($conn, $q2);
        if(mysqli_num_rows($d2) != 0){
            while($t2 = mysqli_fetch_assoc($d2)){
                $subjectID = $t2['id'];

                $res = 0;
                foreach($allCls as $clsId){
                    $q3 = "INSERT INTO sch_sub_class_assoc (subjectId, classId, addedTime, status) VALUES ('$subjectID', '$clsId', '$cTime', '1')";
                    $d3 = mysqli_query($conn, $q3);
                    if($d3){
                        $res = 1;
                    }else{
                        echo mysqli_error($conn);
                    }
                }
                echo $res;
            }
            
        }

    }else{
        echo mysqli_error($conn);
    }
}else{
    echo '2';
}
?>