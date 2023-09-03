<?php
include('../include/connection.php');   //includeing conection file 

//geting values as an assoc array
$class = strtoupper($_POST['name']);    
$levelId = strtoupper($_POST['levelId']);           
$cTime = time();


//select query executing 
$q = "SELECT * FROM sch_class WHERE classname = '$class'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){ 

    $qa = "SELECT * FROM sch_class ORDER BY ord ASC";
    $da = mysqli_query($conn, $qa);
    if (mysqli_num_rows($da) != 0) {
        while ($ta = mysqli_fetch_assoc($da)) {
            $order = $ta['ord']+1;
        }
    }else{
        $order = 1;
    }

    $q = "INSERT INTO sch_class (classname, ord, levelId, addedtime, status) VALUES ('$class', '$order', '$levelId', '$cTime', '1')";
    $d = mysqli_query($conn, $q);
    if($d){
        echo '1';  //if $d exist echom 1
    }else{
        echo mysqli_error($conn);  //returns the last error description for the most recent function call, if any.
    } 

}else{
    echo '2'; ////if no. of rows are zero than echo 2
}


?>