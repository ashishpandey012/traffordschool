<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/head.php'?>
    <title>Add Class | School Management</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Add Class</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Education Level</lable>
                                <select class="form-control mb-3" id="level">
                                    <option value="0">Select Level</option>
                                    <?php
                                    $q = "SELECT * FROM sch_education_level WHERE status='1'";  
                                    $d = mysqli_query($conn, $q);  
                                    if(mysqli_num_rows($d) != 0){   
                                        while($t = mysqli_fetch_assoc($d)){  
                                            ?>
                                            <option value="<?php echo $t['id']?>"><?php echo $t['levelname']?></option>   
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <lable>Class Name</lable>
                                <input type="text" class="form-control name">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-success btn-md saveclass">Save</button>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-6">
                    <div class="card-body">
                        <div class="view-class"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php';?>
</body>
<script>
    $(document).ready(function(){
        $(".view-class").load("view/load-class.php");   //The load() method loads data from a server and puts the returned data into the selected element.
        $(".saveclass").on("click", function(){   //applying function to button
            var levelId = $("#level").find(":selected").val();  //The find() method returns descendant elements of the selected element
            var name = $('.name').val();
            if(levelId != 0){
                if(name != ""){
                        $.ajax({            //applying ajax for avoid loading
                            type:'post',       //it is http request
                            data:{             //A data to be sent to the server
                                levelId:levelId,
                                name:name,
                            },
                            url:'functions/save-class.php',     
                            success:function(e){  
                                if (e == 1) {     
                                    alert('Saved');
                                    $(".view-class").load("view/load-class.php");
                                }else if(e == 2){
                                    alert('Data Already Exist');
                                }else{
                                    alert('error');
                                    console.log(e);
                                }                            
                            }
                        })
                }else{
                    alert("Class Name Empty");
                }
            }else{
                alert("Level is Not Selected");
            }
            });
        });
</script>
</html>