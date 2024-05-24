<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php'; </script>";
}
include('dbconn.php');
$departmentid = $_GET["departmentid"];
$querydelete = "DELETE from departments where slno='$departmentid'";
if (mysqli_query($conn, $querydelete)) {
    $msgdeldep = "Department Deleted";
    echo "<script>alert('$msgdeldep');window.location.href='departments.php';</script>";
} else {
}
?>