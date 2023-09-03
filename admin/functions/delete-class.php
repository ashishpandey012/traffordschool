<?php 
include '../include/connection.php';
//deleting data from table by there id
$id = $_POST['id'];
$q = "DELETE FROM sch_class WHERE id = '$id'";    
$d = mysqli_query($conn, $q);
if ($d) {
    echo '1';
}else{
    echo mysqli_error($conn);
}
?>