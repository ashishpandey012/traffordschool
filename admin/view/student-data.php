<?php
include('include/header.php');
?>
<?php include('../include/connection.php'); ?>
    <section>
        <div class="container">
            <div class="heading text-center mb-3">
                <h2>Students Data</h2>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Mob. No.</th>
                        <th>Date $ Time</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    $q = "SELECT * FROM studentdata";
                    $d = mysqli_query($conn, $q);
                    if(mysqli_num_rows($d) != 0){
                        while($t = mysqli_fetch_assoc($d)){
                            $count++;
                            ?>
                        <tr>
                            <td><?php echo $count?></td>    
                            
                            <td><?php echo ucwords($t['name']) ?></td>
                            <td><?php echo ucwords($t['email']) ?></td>
                            <td><?php echo $t['mobile'] ?></td>
                            <td><?php echo  date('d-m-y h:s A', $t['addedtime']) ?></td>
                            <td>
                                <img src="../upload/student/<?php echo $t['studimg']?>" width="50px">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="../edit-student.php?uid=<?php echo $t['id']?>"><i class="far fa-edit"></i></a>
                                <a href="../functions/delet-student.php?uid=<?php echo $t['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

<?php
include('../include/footer.php');
?>