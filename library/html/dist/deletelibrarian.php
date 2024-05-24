<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php'; </script>";
}
include('dbconn.php');
$dellibrarian = $_GET["s"];
$querydelete = "DELETE from librariandetails where slno='$dellibrarian'";
if (mysqli_query($conn, $querydelete)) {
    $msgdeldep = "Librarian Deleted Sucessfully";
    echo "<script>alert('$msgdeldep');window.location.href='viewalllibrariandetails.php';</script>";
} else {
}
?>