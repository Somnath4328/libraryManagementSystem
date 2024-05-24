<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php'; </script>";
}
include('dbconn.php');
$subjectid = $_GET["subjectid"];
$querydelete = "DELETE from subjects where slno='$subjectid'";
if (mysqli_query($conn, $querydelete)) {
    $msgdeldep = "Subjects Deleted";
    echo "<script>alert('$msgdeldep');window.location.href='subjects.php';</script>";
} else {
}
?>