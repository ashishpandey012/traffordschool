<?php
include('../include/connection.php');
$id = $_POST['id'];
$class = strtoupper($_POST['name']);
$order = $_POST['order'];
$levelId = strtoupper($_POST['levelId']);

//select query for sch_class table  
$q = "SELECT * FROM sch_class WHERE classname = '$class'  AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){
    //update query  for sch_table by setting all the coloumns by there id
    $q = "UPDATE sch_class SET classname='$class', ord='$order', levelId='$levelId' WHERE id='$id'";
    $d = mysqli_query($conn, $q);
    if ($d) {
        echo '1';
    }else{
       echo mysqli_error($conn);
    }
}else{
    echo "2";
}

?>