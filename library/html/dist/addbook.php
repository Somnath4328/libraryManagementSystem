<?php session_start();
if (empty($_SESSION["librarian"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='librarianlogin.php';</script>";
}
include("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Add and View Book Details</title>
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
                <h1 class="page-title">Books</h1>
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
                                <div class="ibox-title">Enter Books Details Here</div>
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
                                            <option value="">Select Subject</option>
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
                                        <input class="form-control" placeholder="Enter Book Name" name="bookname" type="text" title="Please Enter Book Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Author Name :</b></label>
                                        <input class="form-control" placeholder="Enter Author Name Of the Book" name="authorname" type="text" title="Please Enter Author Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Publisher :</b></label>
                                        <input class="form-control" placeholder="Enter Publisher Name" name="publisher" type="text" title="Please Enter Publisher Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label><b>Edition :</b></label>
                                        <input class="form-control" placeholder="Enter Edition Of the Book" name="edition" type="text" title="Please Enter Edition Of The Book" required>
                                    </div>

                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg" type="submit" name="add">Add</button>
                                        </div>
                                    </center>
                                </form>
                                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Subject Name</th>
                                            <th>Book Name</th>
                                            <th>Author Name</th>
                                            <th>Publisher</th>
                                            <th>Edition</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Subject Name</th>
                                            <th>Book Name</th>
                                            <th>Author Name</th>
                                            <th>Publisher</th>
                                            <th>Edition</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $qbook = "select * from books";
                                        $resbook = mysqli_query($conn, $qbook);
                                        $c = 1;
                                        while ($rowbook = mysqli_fetch_assoc($resbook)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $rowbook['subjectname']; ?></td>
                                                <td><?php echo $rowbook['bookname']; ?></td>
                                                <td><?php echo $rowbook['authorname']; ?></td>
                                                <td><?php echo $rowbook['publisher']; ?></td>
                                                <td><?php echo $rowbook['edition']; ?></td>
                                                <td><a class="fa fa-edit" href="editbook.php?s=<?php echo $rowbook['slno']; ?>" onclick="return confirm('Do You Want Edit This Book Details')" ;></a></td>
                                                <td><a class="fa fa-trash" href="deletebook.php?bookid=<?php echo $rowbook['slno']; ?>" onclick="return confirm('Do You Want Delete This Book')" ;></a></td>
                                            </tr>
                                        <?php
                                            $c++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    if (isset($_POST["add"])) {

        $subjectname = $_POST["subjectname"];
        $bookname = $_POST["bookname"];
        $authorname = $_POST["authorname"];
        $publisher = $_POST["publisher"];
        $edition = $_POST["edition"];
        $alreadycheck = "select *from books where subjectname='$subjectname' and bookname='$bookname' and edition='$edition'";
        $resbook = mysqli_query($conn, $alreadycheck);
        $rcbook = mysqli_num_rows($resbook);
        if ($rcbook == 0) {
            $insertbook = "insert into books values('','$subjectname','$bookname','$authorname','$publisher','$edition')";
            if (mysqli_query($conn, $insertbook)) {
                echo "<script>alert('Book Details Added Successfully');window.location.href='addbook.php';</script>";
            } else {
                echo "<script>alert('Book Details Not Added');window.location.href='addbook.php';</script>";
            }
        } else {
            echo "<script>alert('Book Details Already Exist');window.location.href='addbook.php';</script>";
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