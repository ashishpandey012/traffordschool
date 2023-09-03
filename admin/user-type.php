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
                    <h1 class="h3 mb-0 text-gray-800">Add User Type</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 mb-3">
                            <lable>Add User Type</lable>
                            <input type="text" class="form-control name" placeholder="Enter User Type">
                        </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-md saveuser">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="view-userType"></div>
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
        $(".view-userType").load("view/load-user-type.php");
        $(".saveuser").on("click", function(){
            var name = $('.name').val();            
            if(name != ""){
                $.ajax({
                    type: 'post',
                    data: {
                        name:name
                    },
                    url:'functions/save-user-type.php',
                    success:function(e){
                        if (e == 1) {
                            alert('Saved');
                            $('.name').val('')
                            $(".view-userType").load("view/load-user-type.php")
                        }else if(e == 2){
                            alert('Already Exist');
                        }else{
                            alert('error');
                            console.log(e);
                        }                            
                    }
                })
            }else{
                alert("User Type Empty");
            }
        });
    });
</script>
</html>