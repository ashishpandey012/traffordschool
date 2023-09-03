<option value="0">Select Class</option>
<?php
include('../include/connection.php');
$eduLevID = $_POST['eduLevID'];
$q = "SELECT * FROM sch_class WHERE levelId = '$eduLevID' AND status = '1'";
$d = mysqli_query($conn, $q);
if (mysqli_num_rows($d) != 0) {
    while ($t = mysqli_fetch_assoc($d)) {
        ?>
        <option value="<?php echo $t['id']?>"><?php echo $t['classname']?></option>
        <?php
    }
}
?>