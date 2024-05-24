<?php
include('dbconn.php');
?>
<select name="departmentname">
    <option>Select Department</option>
    <?php
    $s = $_GET['q'];
    $q = "select departmentname from departments where coursename='$s'";
    $result = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row['departmentname']; ?>"><?php echo $row["departmentname"]; ?></option>
    <?php
    }
    ?>
</select>