<?php include('../include/connection.php'); ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email & Password</th>
                <th>D.O.B</th>
                <th>Mobile No.</th>
                <th>Education Level</th>
                <th>Class</th>
                <th>Class Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            $q = "SELECT * FROM sch_registration";
            $d = mysqli_query($conn, $q);
            if(mysqli_num_rows($d) != 0){
                while($t = mysqli_fetch_assoc($d)){
                    $count++;
                    //for loading coloumn data from data base to this table
                    $edulevId = $t['eduLevID'];
                    $classId = $t['classId'];
                    $classSection = $t['classSection'];

                    $q1 = "SELECT * FROM sch_education_level WHERE id = '$edulevId'";
                    $d1 =mysqli_query($conn,$q1);
                    if(mysqli_num_rows($d1) != 0){
                        while($t1 = mysqli_fetch_assoc($d1)){
                            $levelname = $t1['levelname'];
                        }
                    }
                    $q2 = "SELECT * FROM sch_class WHERE id = '$classId'";
                    $d2 =mysqli_query($conn,$q2);
                    if(mysqli_num_rows($d2) != 0){
                        while($t2 = mysqli_fetch_assoc($d2)){
                            $classname = $t2['classname'];
                        }
                    }
                    $q3 = "SELECT * FROM sch_class_section WHERE id = '$classSection'";
                    $d3 =mysqli_query($conn,$q3);
                    if(mysqli_num_rows($d3) != 0){
                        while($t3 = mysqli_fetch_assoc($d3)){
                            $secationName = $t3['secationName'];
                        }
                    }

                    ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $t['name'] ?></td>
                        <td><?php echo $t['username'] ?></td>
                        <td>
                            <p><?php echo $t['email'] ?></p>
                            <p>Password: <?php echo $t['password']?></p>
                        </td>
                        <td><?php echo ($t['dob']) ?></td>
                        <td><?php echo ($t['mobile']) ?></td>
                        <!-- value of that data will appear in the table otherwise only id will print -->
                        <td><?php echo $levelname ?></td>
                        <td><?php echo $classname ?></td>
                        <td><?php echo $secationName ?></td>
                        <td>
                            <a href="edit-registration.php?id=<?php echo $t['id']?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                            <button data-id="<?php echo $t['id']?>" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            <?php
                            if($t['status'] == 1){
                                ?>
                                <button class="desable btn btn-dark btn-sm" data-id="<?php echo $t['id']?>"><i class="far fa-eye"></i></button>
                                <?php
                            }else{
                                ?>
                                <button class="enable btn btn-info btn-sm" data-id="<?php echo $t['id']?>"><i class="far fa-eye-slash"></i></button>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    
                }
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(".delete").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_registration';
        if(confirm("Sure to Delete Data")){
            $.ajax({
                type:'post',
                data:{
                    id:id,
                    tableName:tableName,
                },
                url:'functions/delete-data.php',
                success:function (e) {
                    if (e == 1) {
                        $(".view-reg").load("view/load-user.php");
                    }else{
                        alert('Error');
                    }
                }
            });
        }
    });

    $(".desable").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_registration';
        if(confirm("Are you sure to disable")){
            $.ajax({
               type: "post",
               data:{
                id:id,
                tableName:tableName,
               },
               url: 'functions/disable-data.php',
               success:function(e){
                if(e == 1){
                    $(".view-reg").load("view/load-user.php");
                }else{
                    alert("error")
                }
               }
            })
        }
    });

    $(".enable").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_registration';
        if(confirm("Are you sure to Enable")){
            $.ajax({
               type: "post",
               data:{
                id:id,
                tableName:tableName,
               },
               url: 'functions/enable-data.php',
               success:function(e){
                if(e == 1){
                    $(".view-reg").load("view/load-user.php");
                }else{
                    alert("error")
                }
               }
            })
        }
    });
</script>