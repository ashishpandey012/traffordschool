<?php
include('../include/connection.php');   
$userType = $_POST['userType'];
$name = strtoupper($_POST['name']);    
$username = $_POST['username'];           
$email = base64_encode(strtolower($_POST['email']));           
$password = base64_encode($_POST['password']);           


//select query executing 
$q = "SELECT * FROM sch_users WHERE username = '$username' OR email = '$email'";
$d = mysqli_query($conn, $q);
if(mysqli_num_rows($d) == 0){ 

    $q = "INSERT INTO sch_users (userTypeID, name, username, email, password, status) VALUES ('$userType', '$name', '$username', '$email', '$password', '1')";
    $d = mysqli_query($conn, $q);
    if($d){
        echo '1';  //if $d exist echom 1
    }else{
        echo mysqli_error($conn);  //returns the last error description for the most recent function call, if any.
    } 

}else{
    echo '2';   //if no. of rows are zero than echo 2
}
?>
