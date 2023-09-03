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
                    <h1 class="h3 mb-0 text-gray-800">Add Form Two</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <lable>Your Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter your Name">
                            </div>
                            <div class="col-md-2 mt-4">
                            <lable>Gender:</lable>
                            </div>
                            <div class="col-md-2 mt-4">
                                <input class="form-check-input gender" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male"> Male</label>
                            </div>
                            <div class="col-md-2 mt-4">
                                <input class="form-check-input gender" type="radio" name="gender"  id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success btn-sm saveform2">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="view-form2"></div>
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
        $(".view-form2").load("view/load-form2.php");
        $(".saveform2").on("click", function(){
            var name = $('.name').val();
            var gender = $(".gender:checked").val(); 
                    if(name != ""){
                        if(gender != undefined){
                            $.ajax({
                                type: 'post',
                                data: {
                                    name:name,
                                    gender:gender,
                                },
                                url:'functions/save-form2.php',
                                success:function(e){
                                   alert(e);
                                   $(".view-form2").load("view/load-form2.php");                       
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