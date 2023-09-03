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
                    <h1 class="h3 mb-0 text-gray-800">Add Education Level</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <lable>Education Level</lable>
                                <input type="text" class="form-control name" placeholder="Enter Education Level">
                            </div>
                            
                        </div>
                        <div>
                            <button class="btn btn-success btn-md saveclass">Save</button>
                        </div>
                        
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="view-education"></div>
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
        $(".view-education").load("view/load-education.php");
        $(".saveclass").on("click", function(){
            var name = $('.name').val();
            if(name != ""){
                $.ajax({
                    type: 'post',
                    data: {
                        name:name,
                    },
                    url:'functions/save-education.php',
                    success:function(e){
                        if (e == 1) {
                            alert('Saved');
                            $(".view-education").load("view/load-education.php");
                        }else if(e == 2){
                            alert('Already Exist');
                        }else{
                            alert('error');
                            console.log(e);
                        }                          
                    }
                })
            }else{
                alert("Education Level Empty")
            }
        });
    });
</script>
</html>