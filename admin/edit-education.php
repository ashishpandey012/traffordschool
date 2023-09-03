
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
                    <h1 class="h3 mb-0 text-gray-800">Update Education Level</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_education_level WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $edulevel = $t['levelname'];
                        $eduOrd = $t['ord'];
                    }
                }
                ?>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <lable>Education Level</lable>
                                <input type="text" class="form-control name" value="<?php echo $edulevel?>" placeholder="Enter Education Level">
                            </div>
                            <div class="col-md-6 mb-3">
                                <lable>Order</lable>
                                <input type="number" class="form-control order" value="<?php echo $eduOrd?>" placeholder="Enter Education Order">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-md upclass" data-id="<?php echo $id?>">Update</button>
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
        $('.upclass').on('click', function () {
            var id = $(this).attr('data-id');
            var name = $('.name').val();
            var order = $('.order').val();

            if(name != ""){
                if(order != ""){
                    $.ajax({
                        type:'post',
                        data:{
                            id:id,
                            name:name,
                            order:order,
                        },
                        url:'functions/update-level.php',
                        success:function(e){
                            if (e == 1) {
                                alert('Saved');
                                location.href = 'add-education.php';
                            }else if(e == 2){
                                alert('Already Exist');
                            }else{
                                alert('error');
                                console.log(e);
                            }                         
                        }
                    })
                }else{
                    alert("Order Empty")
                }
            }else{
                alert("Class Name Empty")
            }
        })
    })
</script>
</html>