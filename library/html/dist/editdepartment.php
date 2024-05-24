<?php session_start();
if (empty($_SESSION["admin"])) {
    $msg = "Please Login";
    echo "<script>alert('$msg');window.location.href='adminlogin.php';</script>";
}
include("dbconn.php");
?>
<?php
$s = $_GET['s'];
$query = "SELECT *from departments where slno = '$s'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Edit Departments Details</title>
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
                <h1 class="page-title">Edit Department</h1>
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
                                <div class="ibox-title">Edit Department Details Here</div>
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
                                            <select class="form-control" id="course-dropdown" name="coursename">
                                                <option value="<?php echo $row['coursename']; ?>"><?php echo $row['coursename']; ?></option>
                                                <?php
                                                require_once "dbconn.php";
                                                $result = mysqli_query($conn, "SELECT * FROM courses");
                                                while ($rowcourse = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $rowcourse['coursename']; ?>"><?php echo $rowcourse["coursename"]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Department Name :</label>
                                            <input class="form-control" placeholder="Enter Department Name" name="departmentname" type="text" title="Please Enter Department Name In Character" value="<?php echo $row['departmentname']; ?>" required>
                                        </div>
                                    </div>
                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <a class="btn btn-danger btn-lg" href="departments.php">Cancel</a>
                                            <button class="btn btn-success btn-lg" type="submit" name="edit">Edit</button>
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

    if (isset($_POST["edit"])) {
        $coursename = $_POST["coursename"];
        $departmentname = $_POST["departmentname"];
        $update = "UPDATE departments SET coursename='$coursename', departmentname='$departmentname' where slno='$s'";
        if (mysqli_query($conn, $update)) {
            $message = "Department Details Edited Successfully";
            echo "<script>alert('$message');window.location.href='departments.php';</script>";
        } else {
            $message = "Department Details Not Edited";
            echo "<script>alert('$message');window.location.href='editdepartment.php';</script>";
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