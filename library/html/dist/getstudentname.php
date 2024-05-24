<?php
include('dbconn.php');
?>
<select name="studentname">
    <option>Select Student Name</option>
    <?php
    $s = $_GET['q'];
    $s1 = $_GET['q1'];
    $q = "select * from student where studentcourse='$s' and studentdepartment='$s1'";
    $result = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row['studentemail']; ?>"><?php echo $row["firstname"]; ?> <?php echo $row["lastname"]; ?></option>
    <?php
    }
    ?>
</select>