<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php';</script>";
}
include("dbconn.php");
?>
<?php
$s = $_GET['s'];
$query = "SELECT * FROM books where slno='$s'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Edit Book Details</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <?php include("librarianheader.php");
        include("librariansidebar.php"); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Edit Books</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">Basic Form</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Books Details Here</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <!-- <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="ibox-body">
                                <form role="form" name="f" method="POST" onsubmit="return check(f);" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label><b>Subject Name :</b></label>
                                        <select class="form-control" id="course-dropdown" name="subjectname">
                                            <option value="<?php echo $row['subjectname']; ?>"><?php echo $row['subjectname']; ?></option>
                                            <?php
                                            require_once "dbconn.php";
                                            $result = mysqli_query($conn, "SELECT * FROM subjects");
                                            while ($rowsubject = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $rowsubject['subjectname']; ?>"><?php echo $rowsubject["subjectname"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Book Name :</b></label>
                                        <input class="form-control" placeholder="Enter Book Name" name="bookname" type="text" title="Please Enter Book Name" value="<?php echo $row['bookname']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Author Name :</b></label>
                                        <input class="form-control" placeholder="Enter Author Name Of the Book" name="authorname" type="text" title="Please Enter Author Name" value="<?php echo $row['authorname']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Publisher :</b></label>
                                        <input class="form-control" placeholder="Enter Publisher Name" name="publisher" type="text" title="Please Enter Publisher Name" value="<?php echo $row['publisher']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Edition :</b></label>
                                        <input class="form-control" placeholder="Enter Edition Of the Book" name="edition" type="text" title="Please Enter Edition Of The Book" value="<?php echo $row['edition']; ?>" required>
                                    </div>

                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <a class="btn btn-danger btn-lg" href="addbook.php">Cancel</a>
                                            <button class="btn btn-success btn-lg" type="submit" name="editbook">Edit</button>
                                        </div>
                                    </center>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    <?php

    if (isset($_POST["editbook"])) {

        $subjectname = $_POST["subjectname"];
        $bookname = $_POST["bookname"];
        $authorname = $_POST["authorname"];
        $publisher = $_POST["publisher"];
        $edition = $_POST["edition"];
        $update = "UPDATE books SET subjectname='$subjectname', bookname='$bookname', authorname='$authorname',publisher='$publisher', edition ='$edition' where slno='$s'";
        if (mysqli_query($conn, $update)) {
            echo "<script>alert('Book Details Edited Successfully');window.location.href='addbook.php';</script>";
        } else {
            echo "<script>alert('Book Details Not Edited');window.location.href='editbook.php';</script>";
        }
    }
    ?>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
</body>

</html>