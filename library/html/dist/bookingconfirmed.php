<?php session_start();
if (empty($_SESSION["student"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='studentlogin.php'; </script>";
}

include('dbconn.php');
$studentemail = $_SESSION['student'];
$bookid = $_GET["bookid"];

$select =  "select *from stock where bookid='$bookid'";
$resbookdetails = mysqli_query($conn, $select);
$rowbookdetails = mysqli_fetch_assoc($resbookdetails);

$date = date("Y-m-d H:i:s");

$insert = "insert into booking values('','$studentemail','$bookid','','Booked','$date','','','')";
if (mysqli_query($conn, $insert)) {
    $update = "UPDATE stock SET quantity = quantity - 1 where bookid='$bookid'";
    mysqli_query($conn, $update);
    echo "<script>alert('Booking Confirmed');window.location.href='booking.php';</script>";
} else {
}
