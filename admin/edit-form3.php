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
                    <h1 class="h3 mb-0 text-gray-800">Edit User Type & Name</h1>
                </div>
                <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM sch_form3 WHERE id = '$id'";
                $d = mysqli_query($conn, $q);
                if (mysqli_num_rows($d) != 0) {
                    while ($t = mysqli_fetch_assoc($d)) {
                        $UserType = $t['userTypeID'];
                        $name = $t['name'];

                    }
                }
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Select User Type</lable>
                                <select class="form-control mb-3" id="type">
                                    <option value="0">Select User Type</option>
                                    <?php
                                    $q = "SELECT * FROM user_type WHERE status='1'";  
                                    $d = mysqli_query($conn, $q);  
                                    if(mysqli_num_rows($d) != 0){   
                                        while($t = mysqli_fetch_assoc($d)){
                                            if ($t['id'] == $UserType){
                                                ?>
                                                <option Selected value="<?php echo $t['id']?>"><?php echo $t['name']?></option>   
                                                <?php
                                            }else{
                                                ?>
                                                <option value="<?php echo $t['id']?>"><?php echo $t['name']?></option>   
                                                <?php
                                            }
                                           
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <lable>Name</lable>
                                <input type="text" class="form-control name" placeholder="Enter your Name" value="<?php echo $name?>">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-md upform3" data-id="<?php echo $id?>">Update</button>
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
    $(".view-type").load("view/load-form3.php");   //The load() method loads data from a server and puts the returned data into the selected element.
    $(".upform3").on("click", function(){ 
        var id = $(this).attr('data-id');  
        var UserType = $("#type").find(":selected").val();  //The find() method returns descendant elements of the selected element
        var name = $('.name').val();
        
        if(UserType != 0){
            if(name != ""){
                $.ajax({            //applying ajax for avoid loading
                    type:'post',       //it is http request
                    data:{    
                        id:id,         //A data to be sent to the server
                        UserType:UserType,
                        name:name,
                    },
                    url:'functions/update-form3.php',     
                    success:function(e){  
                        if (e == 1) {
                            alert('Saved');
                            location.href = 'add-form3.php';
                        }else if(e == 2){
                            alert('Already Exist');
                        }else{
                            alert('error');
                            console.log(e); 
                        }                            
                    }
                })
            }else{
                alert("Name Empty");
            }
        }else{
            alert("User Type is Not Selected");
        }
        });
    });
</script>
</html>