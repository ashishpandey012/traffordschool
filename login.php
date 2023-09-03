<?php
session_start();
if(isset($_SESSION['ALS']) == 1){
    header('location: admin/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    * {
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    .login-bg {
        background:blue;
        height:100vh;
        padding-top:150px;
    }
    .login-form {
        background:#fff;
        padding:30px;
        border-radius:3px;
        width:400px;
        margin:0 auto;
    }
</style>
<body>
    <section class="login-bg">
        <div class="container">
            <div class="login-form">
                <h5 class="mb-3">Login</h5>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>User Name</label>
                        <input type="text" class="form-control uname" placeholder="Enter User Name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control pass" placeholder="Enter Password">
                    </div>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary login-btn">Login</button>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
<script>
    $(document).ready(function () {
        $('.login-btn').on('click', function () {
            var uname = $('.uname').val();
            var pass = $('.pass').val();
            if (uname != '') {
                if (pass != '') {
                    $.ajax({
                        type:'post',
                        data:{
                            uname:uname,
                            pass:pass,
                        },
                        url:'functions/login-user.php',
                        success:function (e) {
                            if (e == 1) {
                                location.href = 'admin/index.php';
                            }else{
                                alert('Invalid Username or password');
                            }
                        }
                    });
                }else{
                    alert('Password Empty.');
                }
            }else{
                alert('User Name Empty.');
            }
        });
    });
</script>
</html>