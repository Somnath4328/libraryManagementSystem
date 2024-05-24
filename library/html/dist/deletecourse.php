<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php'; </script>";
}
include('dbconn.php');
$courseid = $_GET["courseid"];
$querydelete = "DELETE from courses where slno='$courseid'";
if (mysqli_query($conn, $querydelete)) {
    $msgdelcourse = "Course Deleted";
    echo "<script>alert('$msgdelcourse');window.location.href='courses.php';</script>";
} else {
}
?>