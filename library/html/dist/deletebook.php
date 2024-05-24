<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php'; </script>";
}
include('dbconn.php');
$bookid = $_GET["bookid"];
$querydelete = "DELETE from books where slno='$bookid'";
if (mysqli_query($conn, $querydelete)) {
    $msgdeldep = "Book Deleted";
    echo "<script>alert('$msgdeldep');window.location.href='addbook.php';</script>";
} else {
}
?>