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
                    <h1 class="h3 mb-0 text-gray-800">Edit Subject</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_sub WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $streamId = $t['streamId'];
                        $subjectName = $t['subjectName'];
                    }
                }
                $allclass = [];
                $q1 = "SELECT * FROM sch_sub_class_assoc WHERE subjectId = '$id' ";
                $d1 = mysqli_query($conn, $q1);
                if(mysqli_num_rows($d1) != 0){
                    while($t1 = mysqli_fetch_assoc($d1)){
                        $classId = $t1['classId'];
                        array_push($allclass, $classId);
                    }
                }
                ?>

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
                                            if($t['id'] == $streamId){
                                                ?>
                                                <option selected value="<?php echo $t['id']?>"><?php echo $t['streamname']?></option>
                                                <?php
                                            }else{
                                                ?>
                                                <option  value="<?php echo $t['id']?>"><?php echo $t['streamname']?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <lable>Subject Name</lable>
                                <input type="text" placeholder="Subject Name" class="form-control name" value="<?php echo $subjectName?>">
                            </div>
                            <div class="col-md-12 mt-3">
                                <lable>Class</lable>
                                <div>
                                    <?php
                                    $q1 = "SELECT * FROM sch_class WHERE status = '1' ORDER BY ord ASC";
                                    $d1 = mysqli_query($conn, $q1);
                                    if(mysqli_num_rows($d1) != 0){
                                        while($t1 = mysqli_fetch_assoc($d1)){
                                            if(in_array($t1['id'], $allclass)){
                                                ?>
                                                <lable class="mr-3 ">
                                                    <input checked type="checkbox" class="clsId" value="<?php echo $t1['id']?>"><?php echo $t1['classname']?>
                                                </lable>
                                                <?php
                                            }else{
                                                ?>
                                                <lable class="mr-3 ">
                                                    <input type="checkbox" class="clsId" value="<?php echo $t1['id']?>"><?php echo $t1['classname']?>
                                                </lable>
                                                <?php
                                            }
                                            
                                        }
                                    }
                                    ?>
                                </div>
                            <div> 
                        </div>
                        <div>
                            <button class="btn btn-success btn-sm mt-3 updatesub" data-id = "<?php echo $id?>">Update</button>
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
        $(".updatesub").on("click", function(){
            var id = $(this).attr("data-id");
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
                                id:id,         
                                streamId:streamId,
                                sub:sub,
                                allCls:allCls,
                            },
                            url:'functions/update-subject.php',     
                            success:function(e){  
                                if (e == 1) {     
                                    alert('Saved');
                                    location.href = 'add-subject.php';
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