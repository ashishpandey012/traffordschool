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
                    <h1 class="h3 mb-0 text-gray-800">Edit Teacher Form</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6 mb-3">
                        <lable>Teacher Name</lable>
                            <input type="text" class="form-control name" placeholder="Enter Your Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable>Teacher Email</lable>
                            <input type="email" class="form-control email" placeholder="Enter Your Email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable>Teacher Mobile Number</lable>
                            <input type="tel" class="form-control mobile" placeholder="Teacher Mobile No.">
                        </div>
                        <div class="col-md-6 mb-3">
                            <lable>Uploade Your Image</lable>
                            <input type="file" class="form-control img"  placeholder="Upload Your Photo">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-md btn-success savetech">Save</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php';?>
</body>

</html>

<script>
    $(document).ready(function(){
        $(".view-teacher").load('view/teacher-data.php');
        $(".savetech").on("click", function(){
            var name = $(".name").val();
            var email = $(".email").val();
            var mob = $(".mobile").val();
            var img = $(".img")[0].files[0];
            var fd = new FormData();
            fd.append('name', name);
            fd.append('email', email);
            fd.append('contact', mob);
            fd.append('stdImg', img);

            if(name != ""){
                if(email != ""){
                    if(mob != ""){
                        if(img != ""){
                            $.ajax({
                                type:"post",
                                data:fd,
                                url:'functions/save-teacher.php',
                                cashe:false,
                                contentType:false,
                                processData:false,
                                success:function(e){
                                    if(e == 1){
                                        alert("Saved");
                                        $(".view-teacher").load('view/teacher-data.php');
                                    }else if(e == 2){
                                        alert(" Email or Mobile No. Already Exist")
                                    }else if(e == 3){
                                        alert("Image Not Uploaded");
                                    }else{
                                        alert("Error");
                                        console.log(e);
                                    }
                                }
                            })
                        }else{
                            alert("Photo not Uploaded");
                        }
                    }else{
                        alert("Mobile Number Empty");
                    }
                }else{
                    alert("Email is Empty");
                }
            }else{
                alert("Name is Empty");
            }
        });
    });
</script>

