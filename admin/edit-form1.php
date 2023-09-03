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
                    <h1 class="h3 mb-0 text-gray-800">Edit Name</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_form1 WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $name = $t['name'];
                    }
                }
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 mb-3">
                            <lable>Name</lable>
                            <input type="text" class="form-control name" value="<?php echo $name?>" placeholder="Enter Name">
                        </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-md upname" data-id="<?php echo $id?>">Update</button>
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
        $('.upname').on('click', function () {
            var id = $(this).attr('data-id');
            var name = $('.name').val();

            if(name != ""){
                    $.ajax({
                        type:'post',
                        data:{
                            id:id,
                            name:name,
                        },
                        url:'functions/update-form1.php',
                        success:function(e){
                            if (e == 1) {
                                alert('Saved');
                                location.href = 'add-form1.php';
                            }else if(e == 2){
                                alert('Already Exist');
                            }else{
                                alert('error');
                                console.log(e); 
                            }                          
                        }
                    })
            }else{
                alert("Name Empty")
            }
        })
    })
</script>
</html>