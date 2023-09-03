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
                    <h1 class="h3 mb-0 text-gray-800">Add Class</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_class WHERE id = '$id'";   //select query from this table to its id whose variable $id
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $className = $t['classname'];
                        $classOrd = $t['ord'];
                        $levelId = $t['levelId'];
                    }
                }
                ?>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <lable>Education Level</lable>
                                <select class="form-control mb-3" id="level">
                                    <option value="0">Select Level</option>
                                    <?php
                                    $q = "SELECT * FROM sch_education_level WHERE status='1'";  //selecting another table to attaching its value
                                    $d = mysqli_query($conn, $q);    //mysqli_query() function performs a query against a database
                                    if(mysqli_num_rows($d) != 0){    //The mysqli_num_rows() function returns the number of rows in a result set.
                                        while($t = mysqli_fetch_assoc($d)){  //mysqli_fetch_assoc() function fetches a result row as an associative array.
                                            if ($t['id'] == $levelId) {
                                                ?>
                                                <!--selected attribute applied becuse while editing the exist name will appear -->
                                                <option selected value="<?php echo $t['id']?>"><?php echo $t['levelname']?></option>
                                                <?php
                                            }else{
                                                ?>
                                                <option value="<?php echo $t['id']?>"><?php echo $t['levelname']?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <lable>Class Name</lable>
                                <input type="text" class="form-control name" value="<?php echo $className?>">
                            </div>
                            <div class="col-md-4">
                                <lable>Order</lable>
                                <input type="number" class="form-control order" value="<?php echo $classOrd?>">
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
            var levelId = $("#level").find(":selected").val();
            var name = $('.name').val();
            var order = $('.order').val();
            if(levelId != ""){
                if(name != ""){
                    if(order != ""){
                        $.ajax({
                            type:'post',
                            data:{      //applying key values and variables
                                id:id,
                                levelId:levelId,
                                name:name,
                                order:order,
                            },
                            url:'functions/update-class.php',
                            success:function(e){
                                if (e == 1) {
                                    alert('Saved');   
                                    location.href = 'add-class.php';   //sending data again to add-class 
                                }else if(e == 2){
                                    alert('Already Exist');
                                } else{
                                    alert('error');
                                    console.log(e);
                                }                           
                            }
                        })
                    }else{
                        alert("Order Empty");
                    }
                }else{
                    alert("Class Name Empty");
                }
            }else{
                alert("Education Level is Empty");
            }    
        });
    });
</script>
</html>