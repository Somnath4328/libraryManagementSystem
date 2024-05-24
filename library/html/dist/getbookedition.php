<?php
include('dbconn.php');
?>
<select name="coursecost">
    <option>Select Book Edition</option>
    <?php
    $s  = $_GET['q'];
    $s1 = $_GET['q1'];
    $s2 = $_GET['q2'];
   ?>
    <?php 
    $q  = "select * from books where subjectname='$s' and slno='$s1' and authorname='$s2'";
    $result = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row['edition']; ?>"><?php echo $row["edition"]; ?></option>
    <?php
    }
    ?>
</select>