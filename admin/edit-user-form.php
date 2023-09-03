
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
                <h1 class="h3 mb-0 text-gray-800">Edit User Form</h1>
            </div>
            <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_users WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $userTypeID = $t['userTypeID'];
                        $name = $t['name'];
                        $username = $t['username'];
                        $email = base64_decode($t['email']);
                        $password = base64_decode($t['password']);
                    }
                }
                ?>
                
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <lable>User Type</lable>
                        <select class="form-control" id="Utype">
                            <option value="0">Select User Type</option>
                            <?php
                            $qa = "SELECT * FROM user_type WHERE status='1'";
                            $da = mysqli_query($conn, $qa);
                            if(mysqli_num_rows($da) != 0){
                                while($ta = mysqli_fetch_assoc($da)){
                                    if($ta['id'] == $userTypeID ){
                                        ?>
                                        <option Selected value="<?php echo $ta['id']?>"><?php echo ucwords($ta['name'])?></option>
                                        <?php  
                                    }else{
                                        ?>
                                        <option value="<?php echo $ta['id']?>"><?php echo ucwords($ta['name'])?></option>
                                        <?php
                                    }
                                    
                                }
                            }
                            ?>
                    </select>
                </div>
                    <div class="col-md-6 mb-3">
                        <lable>Name</lable>
                        <input type="text" class="form-control name" placeholder="Enter Your Name" value="<?php echo $name?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <lable>Enter Username</lable>
                        <input type="text" class="form-control username" placeholder="Enter User Name" value="<?php echo $username?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <lable>Enter Email</lable>
                        <input type="email" class="form-control email" placeholder="Enter Your Email" value="<?php echo $email?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <lable>New Password</lable>
                        <input type="password" class="form-control password" placeholder="Enter New Password" value="<?php echo $password?>">
                    </div>
                </div>
                    <div>
                        <button class="btn btn-success btn-md upduser" data-id="<?php echo $id?>">Update</button>
                    </div>
                </div>
            </div>
        </div>
    
            <!-- /.container-fluid -->
        
            <!-- End of Main Content -->
    </div>
    <?php include 'include/footer.php';?>
</body>
<script>
    $(document).ready(function(){
        $(".upduser").on("click", function(){
            var id = $(this).attr('data-id');
            var userType = $("#Utype").find(":selected").val();
            var name = $('.name').val();
            var username = $('.username').val();
            var email = $('.email').val();
            var password = $('.password').val();
            if(userType != 0){
                if(name != ""){
                    if(username != ""){
                        if(email != ""){
                            if(password != ""){
                                    $.ajax({
                                        type: 'post',
                                        data: {
                                            id:id,
                                            userType:userType,
                                            name:name,
                                            username:username,
                                            email:email,
                                            password:password,
                                        },
                                        url:'functions/update-user-form.php',
                                        success:function(e){
                                            if (e == 1) {
                                                alert('Saved');
                                                location.href = 'user-form.php';
                                            }else if(e == 2){
                                                alert('Already Exist');
                                            }else{
                                                alert('error');
                                                console.log(e);
                                            }                            
                                        }
                                    });
                            }else{
                                alert("Password Empty")
                            }
                        }else{
                            alert("Email Empty")
                        }    
                    }else{
                        alert("Username Empty")
                    }        
                }else{
                    alert("Name Empty")
                }
            }else{
                alert("User Type Not Selected")
            }         
            
        });
    });
</script>
</html>



