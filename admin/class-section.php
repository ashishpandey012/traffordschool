
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
                <h1 class="h3 mb-0 text-gray-800">Add Class Section</h1>
            </div>

                
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <lable>Class</lable>
                        <select class="form-control" id="class">
                            <option value="0">Select Class</option>
                            <?php
                            $q = "SELECT * FROM sch_class WHERE status='1'";
                            $d = mysqli_query($conn, $q);
                            if(mysqli_num_rows($d) != 0){
                                while($t = mysqli_fetch_assoc($d)){
                                    ?>
                                    <option value="<?php echo $t['id']?>"><?php echo $t ['classname']?></option>
                                    <?php
                                }
                            }
                            ?>
                    </select>
                </div>
                    <div class="col-md-6 mb-3">
                        <lable>Section Name</lable>
                        <input type="text" class="form-control name" placeholder="Enter Section Name">
                    </div>
                </div>
                    <div>
                        <button class="btn btn-success btn-md savesection">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="view-section mt-2"></div>
            </div>
        </div>
            <!-- /.container-fluid -->
        
            <!-- End of Main Content -->
    </div>
    <?php include 'include/footer.php';?>
</body>
</html>


<script>
    $(document).ready(function(){
        $(".view-section").load("view/load-section.php");
        $(".savesection").on("click", function(){
            var classId = $("#class").find(":selected").val();
            var name = $('.name').val();
            if(classId != 0){
                if(name != ""){
                    $.ajax({
                        type: 'post',
                        type: 'post',
                        data: {
                            classId:classId,
                            name:name,
                        },
                        url:'functions/save-section.php',
                        success:function(e){
                            if (e == 1) {
                                alert('Saved');
                                $('.name').val('')
                                $(".view-section").load("view/load-section.php")
                            }else if(e == 2){
                                alert('Already Exist');
                            }else{
                                alert('error');
                                console.log(e);
                            }                            
                        }
                    });
                }else{
                    alert("Section Empty")
                }
            }else{
                alert("Class is Not Selected")
            }         
            
        });
    });
</script>

