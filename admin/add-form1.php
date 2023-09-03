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
                    <h1 class="h3 mb-0 text-gray-800">Add Form One</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <lable>Your Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class= "mt-3">
                            <button class="btn btn-sm btn-success saveform1">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="view-form1"></div>
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
        $(".view-form1").load("view/load-form1.php");
        $(".saveform1").on("click", function(){
            var name = $('.name').val();            
            if(name != ""){
                $.ajax({
                    type: 'post',
                    data: {
                        name:name,
                    },
                    url:'functions/save-form1.php',
                    success:function(e){
                        alert(e);    
                        $(".view-form1").load("view/load-form1.php");                     
                    }
                });
            }else{
                alert("Name is Empty");
            }
        });
    });
</script>
</script>
</html>
