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
                    <h1 class="h3 mb-0 text-gray-800">Edit Name & Image</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_form4 WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if(mysqli_num_rows($d) != 0){
                    while($t = mysqli_fetch_assoc($d)){
                        $name = $t['name'];
                        $img = $t['image'];
                    }
                }
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Name</lable>
                                <input type="text" class="form-control name" value="<?php echo $name ?>" placeholder="Enter Your Name">
                            </div>
                            <div class="col-md-6 ">
                                <lable>Upload Image</lable>
                                <input type="file" class="form-control img" placeholder="Upload Image">
                                <div class="mt-4">
                                    <img src="../upload/student/<?php echo $img?>"alt="" width="50px" >
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success btn-sm upform4" data-id="<?php echo $id?>">Update</button>
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
        $(".upform4").on("click", function(){
            var id = $(this).attr('data-id');
            var name = $(".name").val();
            var img = $(".img")[0].files[0];
            var fd = new FormData();
            fd.append('id',id);
            fd.append('name', name);
            fd.append('Fimg', img);

            if(name != ""){
                $.ajax({
                    type:'post',
                    data:fd,
                    url:'functions/update-form4.php',
                    cashe:false,
                    contentType:false,
                    processData:false,
                    success:function(e){
                        if (e == 1) {
                            alert('Saved');
                            location.href = 'add-form4.php';
                        }else if(e == 2){
                            alert('Already Exist');
                        }else{
                            alert('error');
                            console.log(e); 
                        }   
                    }

                });
            }else{
                alert("Name is Empty");
            }

        })
    });
</script>
</html>