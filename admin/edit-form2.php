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
                    <h1 class="h3 mb-0 text-gray-800">Edit Form Two</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_form2 WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $name = $t['name'];
                        $gender = $t['gender'];
                    }
                }
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <lable>Edit Your Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter your Name" value="<?php echo $name?>">
                            </div>
                            <div class="col-md-2 mt-4">
                            <lable>Gender:</lable>
                            </div>
                            <div class="col-md-2 mt-4">
                                <?php
                                if ($gender == 'MALE') {
                                    ?>
                                    <input checked class="form-check-input gender" type="radio" name="gender" id="male" value="male">
                                    <?php
                                }else{
                                    ?>
                                    <input class="form-check-input gender" type="radio" name="gender" id="male" value="male">
                                    <?php
                                }
                                ?>
                                <label class="form-check-label" for="male"> Male</label>
                            </div>
                            <div class="col-md-2 mt-4">
                                <?php
                                if ($gender == 'FEMALE') {
                                    ?>
                                    <input checked class="form-check-input gender" type="radio" name="gender"  id="female" value="female">
                                    <?php
                                }else{
                                    ?>
                                    <input class="form-check-input gender" type="radio" name="gender"  id="female" value="female">
                                    <?php
                                }
                                ?>
                                
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success btn-sm upform2" data-id="<?php echo $id?>">Update</button>
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
        $(".upform2").on("click", function(){
            var id = $(this).attr('data-id');
            var name = $('.name').val();
            var gender = $('.gender:checked').val();
            if(name != ""){
                if(gender != undefined){
                    $.ajax({
                        type: 'post',
                        data: {
                            id:id,
                            name:name,
                            gender:gender,
                        },
                        url:'functions/update-form2.php',
                        success:function(e){
                            if (e == 1) {
                                alert('Saved');
                                location.href = 'add-form2.php';
                            }else if(e == 2){
                                alert('Already Exist');
                            }else{
                                alert('error');
                                console.log(e); 
                            }                       
                        }
                    }) 
                }else{
                    alert("Gender Not Selected");
                }
            }else{
                alert("Name Empty")
            }
        });
    });
</script>
</html>