<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    *{
        margin: 0px;
        padding: 0px;
    }
    .main-content{
        width: 400px;
        background-color: silver;
        margin-top: 50px;
    }
</style>
<body>
<?php include 'include/connection.php' ?>
    <section>
        <div class="container">
            <div class="main-content mx-auto p-4 rounded-5">
                <div class="heading text-center">
                    <h2>Edit Student Detail</h2>
                </div>
                <?php
                $userId = $_GET['uid'];
                $q = "SELECT * FROM studentdata WHERE id = '$userId'";
                $d = mysqli_query($conn, $q);
                if(mysqli_num_rows($d) != 0){
                    while($t = mysqli_fetch_assoc($d)){
                        $name = $t['name'];
                        $email = $t['email'];
                        $mob = $t['mobile'];
                        $userimg = $t['studimg'];
                    }
                }
                ?>
                <form action="functions/update-student.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Student Name" value="<?php echo $name?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Student Email" value="<?php echo $email?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="tel" class="form-control" name="mobile" placeholder="Student Mobile No." value="<?php echo $mob?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="file" class="form-control" name="img" placeholder="Student Image">
                            <img src="upload/student/<?php echo $userimg ?>" width="50px" alt="Image Empty">
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $userId?>">
                        <div>
                            <button class="btn btn-md btn-success">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>