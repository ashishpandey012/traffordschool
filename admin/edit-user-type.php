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
                    <h1 class="h3 mb-0 text-gray-800">Edit User Type</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM user_type WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $Utype = $t['name'];
                    }
                }
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 mb-3">
                            <lable>Stream Name</lable>
                            <input type="text" class="form-control name" value="<?php echo $Utype?>" placeholder="Enter User Type">
                        </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-md uputype" data-id="<?php echo $id?>">Update</button>
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
    $(document).ready(function () {
        $('.uputype').on('click', function () {
            var id = $(this).attr('data-id');
            var name = $('.name').val();

            if(name != ""){
                    $.ajax({
                        type:'post',
                        data:{
                            id:id,
                            name:name
                        },
                        url:'functions/update-user-type.php',
                        success:function(e){
                            if (e == 1) {
                                alert('Saved');
                                location.href = 'user-type.php';
                            }else if(e == 2){
                                alert('Already Exist');
                            }else{
                                alert('error');
                                console.log(e); 
                            }                          
                        }
                    })
            }else{
                alert("Class Name Empty")
            }
        })
    })
</script>
</html>