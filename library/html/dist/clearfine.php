<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php'; </script>";
}
include('dbconn.php');
$bookingid = $_GET["bic"];
$queryclearfine = "UPDATE booking set fineamount = '0' where bookingno='$bookingid'";
if (mysqli_query($conn, $queryclearfine)) {
    $msgclfine = "Fine Paid By The Student";
    echo "<script>alert('$msgclfine');window.location.href='fine.php';</script>";
} else {
}
