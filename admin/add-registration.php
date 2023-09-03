
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
                    <h1 class="h3 mb-0 text-gray-800">Student Form</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <lable>Enter Your Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter Your Name" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter User name</lable>  
                                <input type="text" class="form-control username" placeholder="Enter User Name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter Your E-mail</lable>
                                <input type="email" class="form-control email" placeholder="Enter Your Email">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter Password</lable>
                                <input type="password" class="form-control password" placeholder="Enter Your Password">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>D.O.B</lable>
                                <input type="date" id="dob" class="form-control date" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Enter Mobile No.</lable>
                                <input type="tel" class="form-control mobile" placeholder="Enter Your Mobile No.">
                            </div>
                            <div class="col-md-4 mb-3">
                                <lable>Education Level</lable>
                                <select class="form-control" id="eduLev">
                                    <option value="0">Select Education</option>
                                    <?php
                                    $q = "SELECT * FROM sch_education_level WHERE status='1'";
                                    $d = mysqli_query($conn, $q);
                                    if(mysqli_num_rows($d) != 0){
                                        while($t = mysqli_fetch_assoc($d)){
                                            ?>
                                            <option value="<?php echo $t['id']?>"><?php echo $t['levelname']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <lable>Class</lable>
                                <select class="form-control" id="class">
                                    <option value="0">Select Class</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <lable>Class Section</lable>
                                <select class="form-control" id="classSection">
                                    <option value="0">Select Section</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <lable>Upload Image.</lable>
                                <input type="file" class="form-control img">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-md btn-success saveclass">Save</button>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="view-reg"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php include 'include/footer.php';?>
</body>
<script>
$(document).ready(function(){
    $(".view-reg").load('view/load-user.php');
    $(".saveclass").on("click", function(){
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
                                    if(edulevId != ""){
                                        if(classId != ""){
                                            if(classSection != ""){
                                                if(img != undefined){
                                                    $.ajax({
                                                        type:'post',
                                                        data:fd,
                                                        url:'functions/save-regt.php',
                                                        cashe:false,
                                                        contentType:false,
                                                        processData:false,
                                                        success:function(e){
                                                            if(e == 1){
                                                                alert("Saved");
                                                                $(".view-reg").load('view/load-user.php');
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
                                                    alert("Image Empty");
                                                }
                                            }else{
                                                alert("Section is Empty");
                                            }    
                                        }else{
                                            alert("Class is Empty");
                                        }        
                                    }else{
                                        alert("Education Level Empty");
                                    }   
                                }else{
                                    alert("Mobile Number is Empty");
                                }
                            }else{
                                alert("Date is Empty");
                            }
                        }else{
                            alert("Password is Empty");
                        }
                    }else{
                        alert('Email not valid');
                    }
                }else{
                    alert("Email is Empty");
                }
            }else{
                alert("User Name Is Empty");
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

$(document).ready(function () {
    var todayDate = new Date();
    var month = todayDate.getMonth()+1;
    var year = todayDate.getUTCFullYear();
    var tdate = todayDate.getDate();
        if(month < 10){
            month = "0" + month;
        }
        if(tdate < 10){
            tdate = "0" + tdate;
        }
        var maxDate = year + "-" + month + "-" + tdate;
        $("#dob").attr("max", maxDate);
        console.log(maxDate);

});

</script>
</html> 