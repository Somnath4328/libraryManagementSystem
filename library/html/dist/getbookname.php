<?php
include('dbconn.php');
?>
<select name="departmentname">
    <option>Select Book Name</option>
    <?php
    $s = $_GET['q'];
    $q = "select * from books where subjectname='$s'";
    $result = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row['slno']; ?>"><?php echo $row["bookname"]; ?></option>
    <?php
    }
    ?>
</select>