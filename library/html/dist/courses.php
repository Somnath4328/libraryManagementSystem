<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php';</script>";
}
include("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Add And View Courses</title>
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
        <?php include("adminheader.php");
        include("adminsidebar.php"); ?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->

        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Add Courses</h1>
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
                                <div class="ibox-title">Enter Course Details Here</div>
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
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Course Name :</label>
                                            <input class="form-control" placeholder="Enter Course Name (Ex.- BBA, BCA)" name="coursename" type="text" title="Please Enter Course Name In Character" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Full Course Name :</label>
                                            <input class="form-control" placeholder="Enter Full Course Name(Ex.- For BBA Bachelor In Business Administration)" name="fullcoursename" type="text" title="Please Enter Last Name In Character" required>
                                        </div>
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
                                            <th>Coursename</th>
                                            <th>Full Coursename</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Coursename</th>
                                            <th>Full Coursename</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $qcourses = "select * from courses";
                                        $rescourses = mysqli_query($conn, $qcourses);
                                        $c = 1;
                                        while ($rowcourses = mysqli_fetch_assoc($rescourses)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $rowcourses['coursename']; ?></td>
                                                <td><?php echo $rowcourses['fullcoursename']; ?></td>
                                                <td><a class="fa fa-edit" href="editcourse.php?s=<?php echo $rowcourses['slno']; ?>" onclick="return confirm('Do You Want Edit Course')" ;></a></td>
                                                <td><a class="fa fa-trash" href="deletecourse.php?courseid=<?php echo $rowcourses['slno']; ?>" onclick="return confirm('Do You Want Delete Course')" ;></a></td>
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

        $coursename = $_POST["coursename"];
        $fullcoursename = $_POST["fullcoursename"];
        $alreadycheck = "select *from courses where coursename='$coursename'";
        $rescourse = mysqli_query($conn, $alreadycheck);
        $rccourse = mysqli_num_rows($rescourse);
        if ($rccourse == 0) {
            $insertcourse = "insert into courses values('','$coursename','$fullcoursename')";
            if (mysqli_query($conn, $insertcourse)) {
                $msgsuccess = "New Course Details Added Successfully";
                echo "<script>alert('$msgsuccess');window.location.href='courses.php';</script>";
            } else {
                echo "<script>alert('Course Details Not Added');window.location.href='courses.php';</script>";
            }
        } else {
            echo "<script>alert('Course Details Already Exist');window.location.href='courses.php';</script>";
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