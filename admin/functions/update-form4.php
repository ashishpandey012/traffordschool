<?php
include('../include/connection.php');
$id = $_POST['id'];
$name = strtoupper($_POST['name']);

$q = "SELECT * FROM sch_form4 WHERE name = '$name' AND id != '$id'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){

    if (isset($_FILES['Fimg'])) { // 

        $file_name = $_FILES['Fimg']['name'];
        $file_tem_name = $_FILES['Fimg']['tmp_name'];
        $file_size = $_FILES['Fimg']['size'];
        $file_type = $_FILES['Fimg']['type'];

        $fileNameArr = explode(".", $file_name);
        $newFilename = strtolower($fileNameArr[0]). date('dmyHsi', time()).'.'.$fileNameArr[1];

        move_uploaded_file($file_tem_name, '../../upload/student/'. $newFilename);
        
        $q1 = "UPDATE sch_form4 SET name='$name', image = '$newFilename' WHERE id='$id'";
    }else{
        $q1 = "UPDATE sch_form4 SET name='$name' WHERE id='$id'";
    }

    $d1 = mysqli_query($conn, $q1);
    if ($d1) {
        echo '1';
    }else{
        echo mysqli_error($conn);
    }

}else{
    echo "2";
}

?>