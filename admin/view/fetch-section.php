<option value="0">Select Section</option>
<?php
include('../include/connection.php');
$classId = $_POST['classId'];
$q = "SELECT * FROM sch_class_section WHERE classId = '$classId' AND status = '1'";
$d = mysqli_query($conn, $q);
if (mysqli_num_rows($d) != 0) {
    while ($t = mysqli_fetch_assoc($d)) {
        ?>
        <option value="<?php echo $t['id']?>"><?php echo $t['secationName']?></option>
        <?php
    }
}
?>