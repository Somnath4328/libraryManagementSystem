<?php
include('dbconn.php');
?>
<select name="coursecost">
    <option>Select Author Name</option>
    <?php
    $s = $_GET['q'];
    $s1 = $_GET['q1'];
    $q = "select * from books where subjectname='$s' and slno='$s1'";
    $result = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row['authorname']; ?>"><?php echo $row["authorname"]; ?></option>
    <?php
    }
    ?>
</select>