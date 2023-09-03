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
                    <h1 class="h3 mb-0 text-gray-800">Add Name & Image</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter Your Name">
                            </div>
                            <div class="col-md-6">
                                <lable>Upload Image</lable>
                                <input type="file" class="form-control img" placeholder="Upload Image">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success btn-sm saveform4">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="view-form4"></div>
                </div>
            </div>
            <!-- /.container-fluid -->
            
            <!-- End of Main Content -->
        </div>
        <?php include 'include/footer.php';?>
</body>
<script>
    $(document).ready(function(){
        $(".view-form4").load("view/load-form4.php");
        $(".saveform4").on("click", function(){
            var name = $(".name").val();
            var img = $(".img")[0].files[0];
            var fd = new FormData();
            fd.append('name', name);
            fd.append('Fimg', img);

            if(name != ""){
                if(img != undefined){
                    $.ajax({
                        type:'post',
                        data:fd,
                        url:'functions/save-form4.php',
                        cashe:false,
                        contentType:false,
                        processData:false,
                        success:function(e){
                            alert(e);
                            $(".view-form4").load("view/load-form4.php");
                        }
                    });
                }else{
                    alert("Image Not uploaded");
                }
            }else{
                alert("Name is Empty");
            }

        })
    });
</script>
</html>