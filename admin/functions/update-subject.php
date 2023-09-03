<?php
include('../include/connection.php');
$id = $_POST['id']; //subjectId
$stream = $_POST['streamId'];
$sub = strtoupper($_POST['sub']); 
$allCls = $_POST['allCls'];
$cTime = time();

$q = "SELECT * FROM sch_sub WHERE subjectName = '$sub' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    $q1 = "UPDATE sch_sub SET streamId='$stream', subjectName='$sub'  WHERE id='$id'";
    $d1 = mysqli_query($conn, $q1);
    if ($d1) {
        
        $existsubclasassID = [];
        foreach($allCls as $key){  //$key = classId
            $q2 = "SELECT * FROM sch_sub_class_assoc WHERE subjectId = '$id' AND classId = '$key'";
            $d2 = mysqli_query($conn, $q2);
            if(mysqli_num_rows($d2) != 0){
                while($t2 = mysqli_fetch_assoc($d2)){
                    $subclasassID = $t2['id'];
                    array_push($existsubclasassID, $subclasassID);
                }
            }else{
                $q3 = "INSERT INTO sch_sub_class_assoc(subjectId , classId, addedTime, status) VALUE ('$id', '$key' , '$cTime', '1')";
                $d3 = mysqli_query($conn, $q3);
                if($d3){
                    $q4 = "SELECT * FROM sch_sub_class_assoc WHERE addedTime = '$cTime'";
                    $d4 = mysqli_query($conn, $q4);
                    if(mysqli_num_rows($d4) != 0 ){
                        while($t4 = mysqli_fetch_assoc($d4)){
                            $subclasassID = $t4['id'];
                            array_push($existsubclasassID , $subclasassID);
                        }
                    }
                }else{
                    echo mysqli_error($conn);
                }
            }
        }

        $existsubclasassID_str = implode("','" , $existsubclasassID);
        $q5 = "DELETE FROM sch_sub_class_assoc WHERE subjectId = '$id' AND id NOT IN ('$existsubclasassID_str')";
        $d5 = mysqli_query($conn, $q5);
        if($d5){
            echo "1";
        }else{
            echo mysqli_error($conn);
        }

    }else{
       echo mysqli_error($conn);
    }
}else{
    echo "2";
}

?>