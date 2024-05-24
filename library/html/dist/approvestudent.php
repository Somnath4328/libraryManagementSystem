<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php'; </script>";
}

include('dbconn.php');
$sa = $_GET["studentapprove"];
$query = "UPDATE student SET approvestatus='AP' where slno='$sa'";
if (mysqli_query($conn, $query)) {
    $msg = "Student Details Approved Successfully";
    echo "<script>window.location.href='allstudents.php';</script>";
} else {
}
