<?php
include('../include/connection.php');
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        $q = "SELECT * FROM sch_form2";
        $d = mysqli_query($conn, $q);
        if(mysqli_num_rows($d) != 0){
            while($t = mysqli_fetch_assoc($d)){
                $count++;
                ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo ucwords($t['name'])?></td>
                    <td><?php echo $t['gender']?></td>
                    <td>
                        <a href="edit-form2.php?id=<?php echo $t['id']?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
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

        }else{
            ?>
            <tr>
                <td>Na</td>
                <td>Na</td>
                <td>Na</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script>
     $(".delete").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_form2';
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
                        $(".view-form2").load("view/load-form2.php");
                    }else{
                        alert('Error');
                    }
                }
            });
        }
    });

    $(".desable").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_form2';
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
                    $(".view-form2").load("view/load-form2.php");
                }else{
                    alert("error")
                }
               }
            })
        }
    });

    $(".enable").on("click", function(){
        var id = $(this).attr('data-id');
        var tableName = 'sch_form2';
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
                    $(".view-form2").load("view/load-form2.php");
                }else{
                    alert("error")
                }
               }
            })
        }
    });
</script>