<?php include('../include/connection.php'); ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Teacher Name</th>
                <th>Teacher Email</th>
                <th>Teacher Mob. No.</th>
                <th>Date $ Time</th>
                <th>Teacher Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            $q = "SELECT * FROM sch_teacherdata";
            $d = mysqli_query($conn, $q);
            if(mysqli_num_rows($d) != 0){
                while($t = mysqli_fetch_assoc($d)){
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count?></td>    
                        
                        <td><?php echo strtoupper($t['name']) ?></td>
                        <td><?php echo strtolower($t['email']) ?></td>
                        <td><?php echo $t['contact'] ?></td>
                        <td><?php echo  date('d-m-y h:s A', $t['addedtime']) ?></td>

                        <td>
                            <a class="btn btn-sm btn-warning" href="edit-teacher.php?uid=<?php echo $t['id']?>">Edit</a>
                            <a href="../functions/delet-teacher.php?uid=<?php echo $t['id']?>" class="btn btn-sm btn-danger">Delete</a>

                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>
<script>
       $(".delete").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_registration';
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
    });
</script>
</html>