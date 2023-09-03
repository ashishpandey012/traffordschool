<?php
include('../include/connection.php');
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Stream</th>
            <th>Subject Name</th>
            <th>Class</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        $q = "SELECT * FROM sch_sub";
        $d = mysqli_query($conn, $q);
        if(mysqli_num_rows($d) != 0){
            while($t = mysqli_fetch_assoc($d)){
                $count++;
                $subjectId = $t['id'];
                $streamId = $t['streamId'];
                $subjectName = $t['subjectName'];
                
                ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td>
                        <?php
                        $q1 = "SELECT * FROM sch_stream WHERE id = '$streamId'";
                        $d1 = mysqli_query($conn, $q1);
                        if(mysqli_num_rows($d1) != 0){
                            while($t1 = mysqli_fetch_assoc($d1)){
                                echo $t1['streamname'];
                            };
                        }
                        ?>
                    </td>
                    <td><?php echo $subjectName?></td>
                    <td>
                        <?php
                        $q2 = "SELECT * FROM sch_sub_class_assoc WHERE subjectId = '$subjectId'";
                        $d2 = mysqli_query($conn, $q2);
                        if(mysqli_num_rows($d2) != 0){
                            while($t2 = mysqli_fetch_assoc($d2)){
                                $classId = $t2['classId'];
                                $q3 = "SELECT * FROM sch_class WHERE id = '$classId'";
                                $d3 = mysqli_query($conn, $q3);
                                if(mysqli_num_rows($d3) != 0){
                                    while($t3 = mysqli_fetch_assoc($d3)){
                                        echo $t3['classname'] . ", ";
                                    }
                                }
                            }
                        }
                        ?>
                    </td>

                    <td>
                        <a href="edit-subject.php?id=<?php echo $t['id']?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                        <button data-id="<?php echo $t['id']?>" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        <?php
                        if($t['status'] == 1){
                            ?>
                            <button class="desable btn btn-dark btn-sm" data-id="<?php echo $t['id']?>"><i class="far fa-eye"></i></button>
                            <?php
                        }else{
                            ?>
                            <button class="enable btn btn-info btn-sm" data-id="<?php
                            echo $t['id']?>"><i class="far fa-eye-slash"></i></button>
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
    <script>
         $(".delete").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_sub';
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
                        $(".view-sub").load("view/load-subject.php");
                    }else{
                        alert('Error');
                    }
                }
            });
        }
    });

    $(".desable").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_sub';
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
                    $(".view-sub").load("view/load-subject.php");
                }else{
                    alert("error")
                }
               }
            })
        }
    });

    $(".enable").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_sub';
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
                    $(".view-sub").load("view/load-subject.php");
                }else{
                    alert("error")
                }
               }
            })
        }
    });
    </script>
</table>