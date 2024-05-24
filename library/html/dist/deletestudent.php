<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php'; </script>";
}
include('dbconn.php');
$studentid = $_GET["studentid"];
$querydelete = "DELETE from student where slno='$studentid'";
if (mysqli_query($conn, $querydelete)) {
    $msgdelstudent = "Student Deleted Sucessfully";
    echo "<script>alert('$msgdelstudent');window.location.href='allstudents.php';</script>";
} else {
}
?>