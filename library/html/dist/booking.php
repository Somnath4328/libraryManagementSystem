<?php
session_start();
if (empty($_SESSION["student"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='studentlogin.php';</script>";
}
include("dbconn.php");
$studentemail = $_SESSION['student'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Search and Issue Book</title>
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
        <?php include("studentheader.php");
        include("studentsidebar.php"); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Issue Book</h1>
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
                                <div class="ibox-title">Search Here The Subject For The Book</div>
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

                                    <!-- <div class="form-group">
                                        <label>Student Name :</label>
                                        <input class="form-control" placeholder="Enter Full Name" name="studentname" type="text" title="Please Enter First Name In Character" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Student Roll No.</label>
                                        <input class="form-control" type="number" placeholder="Enter Roll Of The Student" name="studentroll" required>
                                    </div> -->

                                    <div class="form-group">
                                        <label>Subject Name :</label>
                                        <select class="form-control" id="subject-dropdown" name="subjectname">
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

                                    <!-- <div class="form-group">
                                        <label>Semester :</label>
                                        <select class="form-control" id="course-dropdown" name="studentsemester">
                                            <option value="SEMESTER 1">SEMESTER 1</option>
                                            <option value="SEMESTER 2">SEMESTER 2</option>
                                            <option value="SEMESTER 3">SEMESTER 3</option>
                                            <option value="SEMESTER 4">SEMESTER 4</option>
                                            <option value="SEMESTER 5">SEMESTER 5</option>
                                            <option value="SEMESTER 6">SEMESTER 6</option>
                                            <option value="SEMESTER 7">SEMESTER 7</option>
                                            <option value="SEMESTER 8">SEMESTER 8</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" placeholder="Enter Phone Number" name="studentphonenumber" type="text" pattern="[0-9]{10}" title="Please Enter 10 digit Phone Number" maxlength="10" id="num" oninput="return onlynum()" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" placeholder="Email address" name="studentemail" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Student Password</label>
                                        <input class="form-control" type="password" placeholder="Password would be the phone no. of the student" name="studentpassword" required>
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="checkbox">
                                            <span class="input-span"></span>Remamber me</label>
                                    </div> -->
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-dark btn-lg" type="submit" name="search">Search</button>
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
                                            <th>Book Left</th>
                                            <th>Book</th>

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
                                            <th>Book Left</th>
                                            <th>Book</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['search'])) {
                                            $sub = $_POST['subjectname'];



                                            $qbook = "select * from books where subjectname='$sub'";
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
                                                    <td><?php
                                                    $bid = $rowbook['slno'];
                                                    $bookstock = "select * from stock where bookid = '$bid'";
                                                    $resbookstock = mysqli_query($conn, $bookstock);
                                                    $rowbookstock = mysqli_fetch_assoc($resbookstock);
                                                    echo $rowbookstock['quantity'];
                                            
                                                        ?></td>
                                                    <td><a href="bookingconfirmed.php?bookid=<?php echo $rowbook['slno']; ?>" onclick="return confirm('Do You Want To Issue This Book')" ;>Book</a></td>

                                                </tr>
                                        <?php
                                                $c++;
                                            }
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