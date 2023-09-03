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
                    <h1 class="h3 mb-0 text-gray-800">Add Subject</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Stream</lable>
                                <select class="form-select form-control" id="stream">
                                    <option value="0">Select Stream</option>
                                    <?php
                                    $q = "SELECT * FROM sch_stream WHERE status = '1'";
                                    $d = mysqli_query($conn, $q);
                                    if(mysqli_num_rows($d) != 0){
                                        while($t = mysqli_fetch_assoc($d)){
                                            ?>
                                            <option value="<?php echo $t['id']?>"><?php echo $t['streamname']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <lable>Subject Name</lable>
                                <input type="text" placeholder="Subject Name" class="form-control name">
                            </div>
                            <div class="col-md-12">
                                <lable>Class</lable>
                            <div>
                                <?php
                                $q1 = "SELECT * FROM sch_class WHERE status = '1' ORDER BY ord ASC";
                                $d1 = mysqli_query($conn, $q1);
                                if(mysqli_num_rows($d1) != 0){
                                    while($t = mysqli_fetch_assoc($d1)){
                                        ?>
                                        <lable class="mr-3 ">
                                            <input type="checkbox" class="clsId" value="<?php echo $t['id']?>"><?php echo $t['classname']?>
                                        </lable>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm mt-3 savesub">Save</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-6">
                    <div class="card-body">
                        <div class="view-sub"></div>
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
        $(".view-sub").load("view/load-subject.php"); 
        $(".savesub").on("click", function(){
            var streamId = $("#stream").find(":selected").val();
            var sub = $(".name").val();
            var allCls = [];
            $(".clsId").each(function(){
                var clsId = $(this).val();
                if($(this).is(":checked")){
                    allCls.push(clsId);
                }
            });
            if(streamId != 0){
                if(sub != ""){
                    if(allCls != ""){
                        $.ajax({            
                            type:'post',       
                            data:{             
                                streamId:streamId,
                                sub:sub,
                                allCls:allCls,
                            },
                            url:'functions/save-subject.php',     
                            success:function(e){  
                                if (e == 1) {     
                                    alert('Saved');
                                    $(".view-sub").load("view/load-subject.php");
                                }else if(e == 2){
                                    alert('Data Already Exist');
                                }else{
                                    alert('error');
                                    console.log(e);
                                }                            
                            }
                        })
                    }else{
                        alert("Class Not Selected")
                    }
                }else{
                    alert("Subject Empty")
                }
            }else{
                alert("Stream Not Selected");
            }
        })
    });
</script>

</html>