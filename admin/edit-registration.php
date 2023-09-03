<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php'?>
    <?php include 'include/connection.php'?>
</head>
<body id="page-top">
    <?php include 'include/navbar.php';?>
        <!-- Main Content -->
        <div id="content">

            <?php include 'include/topbar.php'?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Student Form</h1>
                </div>

                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_registration WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $name = $t['name'];
                        $username = $t['username'];
                        $email = $t['email'];
                        $pass = $t['password'];
                        $dob= $t['dob'];
                        $mob = $t['mobile'];
                        $img = $t['img'];
                        $edulevId = $t['eduLevID'];
                        $classId = $t['classId'];
                        $classSection = $t['classSection'];
                    }
                }
                ?>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <lable>Enter Your Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter Your Name" value="<?php echo $name?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter User name</lable>  
                                <input type="text" class="form-control username" placeholder="Enter User Name" value="<?php echo $username?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter Your E-mail</lable>
                                <input type="email" class="form-control email" placeholder="Enter Your Email" value="<?php echo $email?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter Password</lable>
                                <input type="password" class="form-control password" placeholder="Enter Your Password" value="<?php echo $pass?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>D.O.B</lable>
                                <input type="date" class="form-control date" value="<?php echo $dob?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter Mobile No.</lable>
                                <input type="tel" class="form-control mobile" placeholder="Enter Your Mobile No." value="<?php echo $mob?>">
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <lable>Education Level</lable>
                                <select class="form-control" id="eduLev">
                                    <option value="0">Select Education</option>
                                    <?php
                                    $qE = "SELECT * FROM sch_education_level WHERE status='1'";
                                    $dE = mysqli_query($conn, $qE);
                                    if(mysqli_num_rows($dE) != 0){
                                        while($tE = mysqli_fetch_assoc($dE)){
                                            if($tE['id'] == $edulevId){  
                                            ?>
                                            <option selected value="<?php echo $tE['id']?>"><?php echo $tE['levelname']?></option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?php echo $tE['id']?>"><?php echo $tE['levelname']?></option>
                                            <?php
                                        }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <lable>Class</lable>
                                <select class="form-control" id="class">
                                    <option value="0">Select Class</option>
                                    <?php
                                    $q1 = "SELECT * FROM sch_class WHERE status='1' AND levelId = '$edulevId'";
                                    $d1 = mysqli_query($conn, $q1);
                                    if(mysqli_num_rows($d1) != 0){
                                        while($t1 = mysqli_fetch_assoc($d1)){
                                            if($t1['id'] == $classId){  
                                            ?>
                                            <option selected value="<?php echo $t1['id']?>"><?php echo $t1['classname']?></option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?php echo $t1['id']?>"><?php echo $t1['classname']?></option>
                                            <?php
                                        }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <lable>Class Section</lable>
                                <select class="form-control" id="classSection">
                                    <option value="0">Select Section</option>
                                    <?php
                                    $q2 = "SELECT * FROM sch_class_section WHERE status='1' AND classId = '$classId'";
                                    $d2 = mysqli_query($conn, $q2);
                                    if(mysqli_num_rows($d2) != 0){
                                        while($t2 = mysqli_fetch_assoc($d2)){
                                            if($t2['id'] == $classSection){  
                                            ?>
                                            <option selected value="<?php echo $t2['id']?>"><?php echo $t2['secationName']?></option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?php echo $t2['id']?>"><?php echo $t2['secationName']?></option>
                                            <?php
                                        }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <lable>Upload Image.</lable>
                                <input type="file" class="form-control img">
                                <div>
                                    <img src="../upload/student/<?php echo $img?>"alt="" width="50px" >
                                </div>
                            </div>  
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-md btn-success upclass" data-id="<?php echo $id?>">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php';?>
</body>
<script>
$(document).ready(function(){
    $(".upclass").on("click", function(){
        var id = $(this).attr('data-id');
        var name = $(".name").val();
        var username = $(".username").val();
        var email = $(".email").val();
        var pass = $(".password").val();
        var dob = $(".date").val();
        var mob = $(".mobile").val();
        var edulevId = $('#eduLev').find(':selected').val();
        var classId = $('#class').find(':selected').val();
        var classSection = $("#classSection").find(':selected').val();
        var img = $(".img")[0].files[0];
        var fd = new FormData();
        fd.append('name', name);
        fd.append('username', username);
        fd.append('email', email);
        fd.append('password', pass);
        fd.append('dob', dob);
        fd.append('mobile', mob);
        fd.append('edulevId', edulevId);
        fd.append('classId', classId);
        fd.append('classSection', classSection);
        fd.append('stdImg', img);

        if(name != ""){
            if(username != ""){
                if(email != ""){
                    if (ValidateEmail(email)) {
                        if(pass != ""){
                            if(dob != ""){
                                if(mob != ""){
                                    $.ajax({
                                        type:'post',
                                        data:fd,
                                        url:'functions/update-regt.php',
                                        cashe:false,
                                        contentType:false,
                                        processData:false,
                                        success:function(e){
                                            if(e == 1){
                                                alert("Saved");
                                                location.href = 'add-registration.php'
                                            }else if(e == 2){
                                                alert("Username or Email or Mobile No. Already Exist")
                                            }else if(e == 3){
                                                alert("Image Not Uploaded");
                                            }else{
                                                alert("Error");
                                                console.log(e);
                                            }
                                        }
                                    });
                                    
                                }else{
                                    alert("Mobile Number is Empty")
                                }
                            }else{
                                alert("Date is Empty")
                            }
                        }else{
                            alert("Password is Empty")
                        }
                    }else{
                        alert('Email Not Valid');
                    }
                }else{
                    alert("Email is Empty")
                }
            }else{
                alert("User Name Is Empty")
            }
        }else{
            alert("Name is Empty");
        }
    });

    $('#eduLev').on('change', function () {
        var eduLevID = $('#eduLev').find(':selected').val();
        $.ajax({
            type:'post',
            data:{
                eduLevID:eduLevID,
            },
            url:'view/fetch-class.php',
            success:function (e) {
                $('#class').html(e);
            }
        });
    });

    $('#class').on('change', function () {
        var classId = $('#class').find(':selected').val();
        $.ajax({
            type:'post',
            data:{
                classId:classId,
            },
            url:'view/fetch-section.php',
            success:function (e) {
                $('#classSection').html(e);
            }
        });
    });
});
</script>
</html>